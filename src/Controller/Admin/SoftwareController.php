<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 03:13
 */

namespace App\Controller\Admin;


use App\Entity\BInstalledSw;
use App\Form\SoftwareType;
use App\Repository\SoftwareRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @route("/view_all/{page}", name="view_software_paginated)
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function view_installed_software(int $page, SoftwareRepository $software): Response
    {
        //$softwares = $software->findAll();
        $softwares = $software->findAllInstalledSw($page);

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
    public function view_detail($sw_id){
        $em = $this->getDoctrine()->getManager();

        $software = $em->getRepository(BInstalledSw::class)->find($sw_id);

        return $this->render('admin/software/view_detail.html.twig', [
            'software' => $software
        ]);
    }

    /**
     * Add software
     * @route("/add", name="add_software")
     */
    public function new(Request $request): Response
    {
        $software = new BInstalledSw();

        $form = $this->createForm(SoftwareType::class, $software);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($software);
            $em->flush();

            $this->addFlash('Success', 'Software successfully inserted into database');

            return $this->redirectToRoute('view_software');
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

}