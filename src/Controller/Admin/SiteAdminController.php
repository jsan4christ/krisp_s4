<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/03
 * Time: 14:57
 */

namespace App\Controller\Admin;

use App\Entity\BServer;
use App\Entity\BSwExpert;
use App\Form\ServerType;
use App\Repository\BSwExpertRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class SiteAdminController
 * @package App\Controller\Admin
 * @route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 */

class SiteAdminController extends AbstractController
{

    ###########################Admin panel main##############
    /**
     * @Route("/", defaults={ "_format"="html"}, name="admin_index")
     *
     */
    public function index()
    {
        return $this->render('admin/home.html.twig',[
            'title' => 'Admin Home'
        ]);
    }
    ########################End admin panel main################

    ########################Begin Manage Own Profile###################

    /**
     * View logged in user profile
     *
     * @route("/view_profile", name="view_profile")
     */
    public function view_profile(BSwExpertRepository $expert)
    {
        $experts = $expert->findAll();

        return $this->render('admin/view_profile.html.twig', [
            'experts'=> $experts
        ]);
    }
    ########################End Manage Own Profile######################

    ########################Begin Manage Experts###################

    /**
     * View logged in user profile
     *
     * @route("/view_experts", name="view_experts")
     */
    public function view_experts(BSwExpertRepository $expert)
    {
        $experts = $expert->findAll();

        return $this->render('admin/view_experts.html.twig', [
            'experts'=> $experts
        ]);
    }
    ########################End Manage Own Profile######################


    ########################Begin software experts###############
    /**
     * Add software expert
     *
     * @route("/add_expert")
     */
    public  function add_expert()
    {
        $expert = new BSwExpert(2, 4);
        $expert->setType("Both");

        //get doctrine entity manager object
        $em = $this->getDoctrine()->getManager();

        //tell doctrine you want to save an expert
        $em->persist($expert);

        //save the expert in the database
        $em->flush();

        return new Response('New expert added'.$expert->getId());

    }
    ######################End software experts######################


    /**
     * Creates a new server entity.
     *
     * @Route("/add_server", name="add_server")
     * @Method({ "POST", "GET"})
     *
     */
    public function new(Request $request): Response
    {
        //$this->denyAccessUnlessGranted('edit', $server, 'You do not have permission to add server');

        $server = new BServer();

        //$server->setSvrName("Sittingbull"); 
        //$server->setSvrIp('192.168.1.101'); 
        //$server->setSvrAddr("http://muucsf.org"); 
        //$server->setInstnsToAccess("Email the admin"); 
        //$server->setInstnsToReqAcc("Email the admin");

        $form = $this->createForm(ServerType::class, $server); //create a form

        $form->handleRequest($request); //make sure it is valid


        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();

            $this->addFlash('success', 'Server added successefully');


            return $this->redirectToRoute('show_servers');
        }

        return $this->render('admin/server/add_server.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);

    }

    /**
     * Show all servers
     *
     * @route("/show_servers", name="show_servers")
     */
    public function show_servers()
    {
        $servers = $this->getDoctrine()
            ->getRepository('App:BServer')
            ->findAll();

        return $this->render('admin/server/show_servers.html.twig', [
            'servers' => $servers
        ]);
    }

    /**
     * update server details
     *
     * @route("/update_server/{svr_id}/edit", name="update_server", requirements={"id": "\d+"})
     * @Method({"GET", "POST"})
     */
    public function update_server(Request $request, BServer $server): Response
    {
        $form = $this->createForm(ServerType::class, $server);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Server updated successfuly');

            return $this->redirectToRoute('update_server', ['svr_id' => $server->getSvrId()]);
        }

        return $this->render('/server/update_server.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);

    }

    /**
     * delete server details
     *
     * @route("/delete_server/{svr_id}", name="delete_server", requirements={"page"="\d+"})
     */
    public function delete_server($svr_id)
    {
        $em = $this->getDoctrine()->getManager();

        $server = $em->getRepository('App:BServer')->find($svr_id);


        if(!$server){
            throw $this->createNotFoundException(
                'No server with the id '.$svr_id
            );
        }

        $em->flush();

        return $this->redirectToRoute('admin_index');
    }

    ##################End Server Routes###########################
}

