<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/18
 * Time: 18:18
 */

namespace App\Controller\Admin;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilder;
use Doctrine\DBAL;
/**
 * Class PeopleController
 * @package App\Controller\Admin
 * @route("/pub")
 */

class PubController extends AbstractController
{

    /**
     * @route("/get_pub_details", name="get_pub_details")
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
           //$result =json_decode($json_result);
           //$ISSN = $result->{'ISSN'};

           //dump($ISSN);

           $this->redirectToRoute('pub_details',[
               'result' => $json_result,
           ]);
       }

       //dump($json_result);
        if(isset($json_result)){
            $result =json_decode($json_result) ;
            $ISSN = $result->{'ISSN'};
        }else{
            $result = ['msg' => 'No result to display'];
            $ISSN = '';
        }

       return $this->render('admin/pub/doi.html.twig', [
           'dd' => $defaultData,
           'form' => $form->createView(),
           'result' => $result,
           'ISSN' => $ISSN,
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

}