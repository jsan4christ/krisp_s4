<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 03:13
 */

namespace App\Controller\Admin;

use App\Entity\BServer;
use App\Entity\BSwCmds;
use App\Entity\BSwExpert;
use App\Entity\BInstalledSw;
use App\Entity\BSwInstLocn;
use App\Entity\BPeople;
use App\Form\CmdType;
use App\Form\ExpertType;
use App\Form\LocationType;
use App\Form\SoftwareType;
use App\Form\ServerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\BSwExpertRepository;
use App\Repository\SoftwareRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

/**
 * Class SoftwareController
 * @package App\Controller\Admin
 * @route("/software")
 * @Security("has_role('ROLE_ADMIN')")
 */
class SoftwareController extends AbstractController
{

    /**
     * Show Software
     * @route("/view_all", defaults = {"page" = "1"},name="view_software")
     * @route("/view_all/{page}", name="view_software_paginated")
     * @Method({"GET"})
     * @Cache(smaxage="10")
     */
    public function view_installed_software(int $page, SoftwareRepository $software): Response
    {
        //$softwares = $software->findAll();
        $softwares = $software->findAllPaginate($page);

        return $this->render('admin/software/view_software.html.twig', [
            'softwares' => $softwares,
        ]);
    }


    /**
     * Show more detail for a given software
     * @route("/{sw_id}/detail", name="view_detail")
     * @Method({"POST", "GET"})
     *
     */
    /*public function view_detail($sw_id){
        $em = $this->getDoctrine()->getManager();

        $software = $em->getRepository(BInstalledSw::class)->getSoftwareDetails($sw_id);

        dump($software);
        return $this->render('admin/software/view_detail.html.twig', [
            'software' => $software
        ]);
    }
*/
    public function view_detail($sw_id){
        $em = $this->getDoctrine()->getManager();
        $software = $em->getRepository(BInstalledSw::class)->find($sw_id);

        $expertise = $software->getExperts();

        $locations = $software->getLocations();

        return $this->render('admin/software/view_detail.html.twig', [
            'software' => $software,
            'expertise' => $expertise,
            'locations' => $locations
        ]);
    }

    /**
     * Add software
     * @route("/new", name="add_software")
     */
    public function new(Request $request): Response
    {
        $software = new BInstalledSw();

        $form = $this->createForm(SoftwareType::class, $software)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            dump($form);
            $em = $this->getDoctrine()->getManager();
            $em->persist($software);
            $em->flush();

            $this->addFlash('success', 'Software successfully inserted into database');

            $nextAction = $form->get('saveAndCreateNew')->isClicked() ? 'add_software' : 'view_software';

            return $this->redirectToRoute($nextAction);
        }

        return $this->render('admin/software/add_software.html.twig',[
            'software' => $software,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Update software
     * @route("/{sw_id}/update", name="update_software")
     */
    public function update(Request $request, $sw_id): Response
    {

        $em = $this->getDoctrine()->getManager();

        $software = $em->getRepository(BInstalledSw::class)->find($sw_id);

        $form = $this->createForm(SoftwareType::class, $software);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();

            $this->addFlash('success', 'The software has been updated successfuly');
            return $this->redirectToRoute('view_software');
        }

        return $this->render('admin/software/update_software.html.twig',[
            'software' => $software,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @route("/search", name="search_software")
     * @Method("GET")
     */

    public function search_sw(Request $request, SoftwareRepository $sr): Response
    {
        if(!$request->isXmlHttpRequest()){
            return $this->render('admin/software/search.html.twig');
        }

        $query = $request->query->get('q', '');
        $limit = $request->query->get('l', '10');

        $foundSw = $sr->findBySearchQuery($query, $limit);

        dump($foundSw);
        $results = [];
        foreach ($foundSw as $sw){
            $results[] = [

                'swName' => htmlspecialchars($sw->getSwName()),
                'swDesc' => htmlspecialchars($sw->getSwDesc()),
                'category' => htmlspecialchars($sw->getCategory()->getCatName()),
                'subcategory' =>htmlspecialchars($sw->getSubcategory()->getSubcatName()),
                'url' => $this->generateUrl('view_detail', ['sw_id' => $sw->getSwId()])
            ];

        }
        return $this->json($results);
    }

    ###############################End Manage Software######################################

    ############################Been Manage Software Locations###############################
    /**
     * @route("/view_locns", name="view_locns")
     */
    public function view_locns()
    {
        $locns = $this->getDoctrine()->getRepository(BSwInstLocn::class)->findAll();

        return $this->render('admin/software/view_locns.html.twig',[
            'locns' => $locns,
        ]);
    }

    /**
     * @route("/add_locn", name="add_locn")
     */
    public function add_locn(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $locn = new BSwInstLocn();

        $form = $this->createForm(LocationType::class, $locn);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($locn);
            $em->flush();

            $this->addFlash('success', 'Location add!');

            return $this->redirectToRoute('view_locns');
        }

        return $this->render('admin/software/add_locn.html.twig', [
            'form' => $form->createView(),
            'locn' => $locn,
            ]);
        }

    /**
     * @route("update_locn/{locnId}", name="update_locn")
     */
    public function update_locn(Request $request ,$locnId)
    {
       $em = $this->getDoctrine()->getManager();

       $locn = $em->find(BSwInstLocn::class, $locnId);

       $form = $this->createForm(LocationType::class, $locn);

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid())
       {
           $em->flush();

           $this->addFlash('success', 'Location updated');

           return $this->redirectToRoute('view_locns');
       }

       return $this->render('admin/software/update_locn.html.twig', [
           'locn' => $locn,
           'form' => $form->createView(),
       ]);
    }

    /**
     * @route("/delete_locn/{locnId}", name="delete_locn")
     */
    public function delete_locn($locnId)
    {
        $em = $this->getDoctrine()->getManager();
        $locn = $em->find(BSwInstLocn::class, $locnId);

        $em->remove($locn);
        $em->flush();

        return $this->redirectToRoute('view_locns');
    }
    #########################End Manage Software Locations#####################

    #########################Begin Manage Experts##############################

    /**
     * View logged in user profile
     *
     * @route("/view_experts", name="view_experts")
     */
    public function view_experts(BSwExpertRepository $expert)
    {
        $experts = $expert->findAll();

        return $this->render('admin/software/view_experts.html.twig', [
            'experts'=> $experts
        ]);
    }

    /**
     * Add software expert
     *
     * @route("/add_expert", name="add_expert")
     * @route("/add_expert/{swId}", name="add_exp_for_sw")
     */
    public  function add_expert(Request $request)
    {   //$uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'krisp.org.za');
        //dump($uuid5->toString()); die;

        //get doctrine entity manager object
        $em = $this->getDoctrine()->getManager();

        $expertArray = array('message' => 'Fill in Expert Details');

        $form = $this->createFormBuilder($expertArray)
            ->add('person',EntityType::class, [
                'class' => BPeople::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])

            ->add('type',ChoiceType::class, [
                'choices' => [
                    'Expert User' => 'Expert User',
                    'Expert Installer' => 'Expert Installer',
                    'Both' => 'Both',
                ]
            ])
            ->add('software', EntityType::class, [
                'class' => BInstalledSw::class,
                'choice_label' => 'swName',
                'multiple' => false,
                'expanded' => false
            ])
            ->getForm();

        $form->handleRequest($request);


        //process expert form if submitted
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $expert = new BSwExpert();
            try{
                $expert->setId(Uuid::uuid5(Uuid::NAMESPACE_DNS, 'krisp.org.za'));
                } catch (UnsatisfiedDependencyException $e){
                throw new HttpException(500, 'Caught Exception'.$e->getMessage());
            }

            $person = $data['person'];
            $software = $data['software'];

            $expert->setPerson($person);
            $expert->setSoftware($software);

            $expert->setType($data['type']);

            //dump($expert);die;
            //tell doctrine you want to save an expert
            $em->persist($expert);

            //save the expert in the database
            $em->flush();

            $this->addFlash('success', 'Expert Added');

            return $this->redirectToRoute('view_experts');
        }

        return $this->render('admin/software/add_expert.html.twig',[
            'expert' => $expertArray,
            'form' => $form->createView(),
        ]);

    }


    /**
     * @route("/update_expert/{eid}", name="update_expert")
     */
    public  function edit_expert(Request $request ,$eid)
    {
        $em = $this->getDoctrine()->getManager();

        $expert = $em->find(BSwExpert::class, $eid);

        $form = $this->createForm(ExpertType::class, $expert);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->flush();

            $this->addFlash('success', 'Details updated!');

            $this->redirectToRoute('view_experts');
        }

        return $this->render('admin/software/update_expert.html.twig', [
            'expert' => $expert,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/add_experts_by_file", name="add_experts_by_file")
     */

    public  function experts_by_file(Request $request)
    {
        $fileArray = ['Message' => 'Submit CSV file'];

        $form = $this->createFormBuilder($fileArray)
                ->add('cmdsCsv', FileType::class)
                ->add('submit', SubmitType::class, [
                    'label' => 'Upload CSV'
                 ])
                ->getForm()
                ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // instead of saving the file to the server
            // $someNewFilename = ...//specify file name to be used.
            // $form['attachment']->getData()->move($dir, $someNewFilename); //directory to store the file and name for the file

            //Extract file
            $cmdsCsv = $form['cmdsCsv']->getData();

            //Check file to confirm it is csv

           // try{
                //process insertion to my sql
          //  } catch (NotFoundHttpException $e){
                //exception if it fails
           // }


            //

            $fType = pathinfo($cmdsCsv, PATHINFO_EXTENSION);
            dump(basename($cmdsCsv));die;

            //check that file is uploaded and that file is .csv

        }

        return $this->render('admin/software/add_experts_by_file.html.twig', [
            'fileArray' => $fileArray,
            'form' => $form->createView(),
        ]);
    }
    ######################End Software experts######################


    ######################Begin Manage Server#######################
    /**
     * Creates a new server entity.
     *
     * @Route("/add_server", name="add_server")
     * @Method({ "POST", "GET"})
     *
     */
    public function add_server(Request $request): Response
    {
        //$this->denyAccessUnlessGranted('edit', $server, 'You do not have permission to add server');

        $server = new BServer();

        $form = $this->createForm(ServerType::class, $server); //create a form

        $form->handleRequest($request); //make sure it is valid


        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();

            $this->addFlash('success', 'Server added successefully');


            return $this->redirectToRoute('view_servers');
        }

        return $this->render('admin/software/add_server.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);

    }

    /**
     * Show all servers
     *
     * @route("/view_servers", name="view_servers")
     */
    public function view_servers()
    {
        $servers = $this->getDoctrine()
            ->getRepository('App:BServer')
            ->findAll();

        return $this->render('admin/software/view_servers.html.twig', [
            'servers' => $servers
        ]);
    }

    /**
     * update server details
     *
     * @route("/update_server/{svr_id}/edit", name="update_server", requirements={"id": "\d+"})
     * @Method({"GET", "POST"})
     */
    public function update_server(Request $request, $svr_id): Response
    {
        $em = $this->getDoctrine()->getManager();

        $server = $em->getRepository(BServer::class)->find($svr_id);

        if(!$server){
            throw $this->createNotFoundException(
                'No server found with id '.$svr_id
            );
        }

        $form = $this->createForm(ServerType::class, $server);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            #$this->getDoctrine()->getManager()->flush();
            $em->flush();

            $this->addFlash('success', 'Server updated successfuly');

            return $this->redirectToRoute('update_server', ['svr_id' => $server->getSvrId()]);
        }

        return $this->render('admin/software/update_server.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);

    }

    /**
     * delete server details
     *
     * @route("/delete_server/{svr_id}", name="delete_server", requirements={"page"="\d+"})
     * @Method("POST")
     * @Security("is_granted('delete', server)")
     */
    public function delete_server(Request $request, BServer $server)
    {
        if($this->isCsrfTokenValid('delete', $request->request->get('token'))){
            return $this->redirectToRoute('admin_index');
        }

        $em = $this->getDoctrine()->getManager();

        $em->remove($server);

        $this->addFlash('success', 'Server deleted successfuly');

        return $this->redirectToRoute('admin_index');
    }

    ##################End Servers###########################

    ##################Begin Commands########################

    /**
     * @route("/add_cmd", name="add_cmd")
     */
    public function add_cmd(Request $request)
    {
        $cmd = new BSwCmds();

        $form = $this->createForm(CmdType::class, $cmd);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($cmd);
            $em->flush();

            $this->addFlash('message', 'Command added!');

            return $this->redirectToRoute('view_software');
        }

        return $this->render('admin/software/add_cmd.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/add_cmds_by_csv", name="add_cmds_by_csv")
     */
    public function add_cmd_by_csv()
    {
        //add logic
    }
    ##################End Commands##########################

}