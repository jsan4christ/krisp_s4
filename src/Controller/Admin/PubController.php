<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/18
 * Time: 18:18
 */

namespace App\Controller\Admin;


use App\Entity\BPublications;
use App\Form\PublicationType;
use App\Repository\PubsRepository;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilder;
use Doctrine\DBAL;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class PeopleController
 * @Security("has_role('ROLE_ADMIN')")
 * @package App\Controller\Admin
 * @route("/pub")
 */

class PubController extends AbstractController
{

    /**
     * @route("/add_pub_by_doi", name="add_pub_by_doi")
     * @route("/get_pub_details/{json_result}", name="pub_details")
     * @Method({"GET","POST"})
     */
    public function get_pub_details(Request $request, $json_result=null)
    {
       $defaultData = ['message' => 'Enter DOI here'];

       $form = $this->createFormBuilder($defaultData)
       ->add('doi', TextType::class)
       ->getForm();

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           $data = $form->getData();

           $doi = $data['doi'];

           $curl = curl_init("".$doi."");
           curl_setopt($curl, CURLOPT_FAILONERROR, true);
           curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/rdf+xml;q=0.5, application/vnd.citationstyles.csl+json;q=1.0'));

           $json_result = curl_exec($curl);
           $result =json_decode($json_result);
           !isset($result->{'ISSN'}) ?: $ISSN = $result->{'ISSN'};
           !isset($volume) ?: $volume = $result->{'volume'};
           $citations = $result->{'reference-count'};
           $pubTitle = $result->{'title'};
           $journal = $result->{'container-title'};
           $author = $result->{'author'};
           $URL = $result->{'URL'};
           $pages = $result->{'page'};
           if(isset($result->{'published-online'})){
               $datePublished = $result->{'published-online'};
               $yearPublished = $datePublished->{'date-parts'};
           }
            ##Generate list of authors
           $authorArr = [];
           foreach ($author as $key => $value){
               if(isset($value->given))
                   $authorArr[] = $value->given ." ". $value->family;
           }

           ##Extract year of publication from date of publication



           $pub = new BPublications();
           $pub->setTitle($pubTitle);
           !isset($ISSN) ?: $pub->setIssn($ISSN[0]);
           $pub->setLink($URL);
           $pub->setAuthors(implode(", ", $authorArr));
           $pub->setCitations($citations);
           !isset($volume) ?: $pub->setVolume($volume);
           !isset($yearPublished) ?: $pub->setDate($yearPublished[0][0]);
           $pub->setDoi($doi);
           !isset($pages) ?: $pub->setPages($pages);
           $pub->setJournal($journal);

           $em = $this->getDoctrine()->getManager();
           $em->persist($pub);
           $em->flush();

           return $this->redirectToRoute('update_pub',[
               'id' => $pub->getId(),
           ]);
       }


       return $this->render('admin/pub/add_pub_by_doi.html.twig', [
           'dd' => $defaultData,
           'form' => $form->createView(),
       ]);
    }

    /**
     * @route("/add_missing_issns", name="add_missing_issns")
     */
    public function update_issn()
    {
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT id, doi FROM b_publications WHERE issn=''";

        $conn = $em->getConnection();
        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $pub_info = $stmt->fetchAll();

        if($pub_info > 0){
            foreach ($pub_info as $pub){
                $curl = curl_init("".$pub['doi']."");
                curl_setopt($curl, CURLOPT_FAILONERROR, true);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/rdf+xml;q=0.5, application/vnd.citationstyles.csl+json;q=1.0'));
                $json_result =  curl_exec($curl);

                $result = json_decode($json_result);

                $ISSN_arr = $result->{'ISSN'};
                $ISSN = $ISSN_arr[0];

                $pubId = $pub["id"];

                $upate_sql = "UPDATE `b_publications` SET `issn` = '".$ISSN."' WHERE `id` = :pubid";

                $stmt2 = $conn->prepare($upate_sql);
                $stmt2->bindValue('pubid', $pubId);
                $stmt2->execute();
            }
        }


        $this->addFlash('success', 'Commands executed');

        return $this->redirectToRoute('admin_index');

    }

    /**
     * @route("/view_pubs", defaults = {"page" = "1"}, name="view_pubs")
     * @route("/view_pubs/{page}", name="view_pubs_paginated")
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function view_pubs(int $page, PubsRepository $pr): Response
    {
        //$pubs = $pr->findAll();
        $pubs = $pr->findAllPaginated($page);

        return $this->render('admin/pub/view_pubs.html.twig', [
            'pubs' => $pubs,
        ]);
    }

    /**
     * @route("/add_pub", name="add_pub")
     */
    public function add_pub(Request $request, FileUploader $fp)
    {
        $pub = new BPublications();

        $form = $this->createForm(PublicationType::class, $pub);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($pub->getFile()){
                $pubFile = $pub->getFile();
                $pubFileName = $pubFile->getClientOriginalName();
                $pubFile->move($fp->getTargetDirectory().'/'.$pubFileName);
                $pub->setFile($pubFileName);
                }

            $em = $this->getDoctrine()->getManager();
            $em->persist($pub);
            $em->flush();

            $this->addFlash('message', 'Publication Added');

            return $this->redirectToRoute('view_pubs');
        }

        return $this->render('admin/pub/add_pub.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/update_pub/{id}", name="update_pub")
     */
    public function update_pub(Request $request, BPublications $pub, FileUploader $fp)
    {
        $oldPubFileName = $pub->getFile();

        if(is_file($fp->getTargetDirectory().'/'.$oldPubFileName)){
            $pub->setFile(new File($fp->getTargetDirectory().'/'.$oldPubFileName));

        }


        $form = $this->createForm(PublicationType::class, $pub);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            if(!is_null($pub->getFile())){
                $pubFile = $pub->getFile();
                $pubFileName = $pub->getImage()->getClientOriginalName() ;
                $pubFile->move($fp->getTargetDirectory(), $pubFileName);
                $pub->setFile($pubFileName);
            }else {
                $pub->setFile($oldPubFileName);
            }

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('message', 'Publication updated successfully!');

            return $this->redirectToRoute('view_pubs');

        }

        return $this->render('admin/pub/update_pub.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}