<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/15
 * Time: 13:21
 */

namespace App\Controller\Admin;

use App\Entity\BSwCat;
use App\Entity\BSwSubcat;
use App\Form\CategoryType;
use App\Form\SubCategoryType;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class cat
 * @package App\Controller\Admin
 * @route("/cat")
 * @Security("has_role('ROLE_ADMIN')")
 */

class CatController extends AbstractController
{
    //Categories
    /**
     * @route("/view_cats", name="view_cats")
     */
    public function view()
    {
        $cats = $this->getDoctrine()->getRepository(BSwCat::class)->findAll();

        return $this->render('admin/cat/view_cats.html.twig', [
            'cats' => $cats
        ]);
    }

    /**
     * @route("/add_cat", name="add_cat")
     */
    public function add_cat(Request $request): Response
    {
        $cat = new BSwCat();

        $form = $this->createForm(CategoryType::class, $cat);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($cat);

            $em->flush();

            $this->addFlash('success', 'Category added!');

            return $this->redirectToRoute('view_cats');

        }

        return $this->render('admin/cat/add_cat.html.twig',[
            'cat' => $cat,
            'form' => $form->createView(),

        ]);
    }

    /**
     * @route("/update_cat/{catId}", name="update_cat")
     *
     */
    public function update_cat(Request $request, $catId)
    {
        $em = $this->getDoctrine()->getManager();
        //$cat = $this->getDoctrine()->getRepository(BSwCat::class)->find($catId);
        $cat = $em->getRepository(BSwCat::class)->find($catId);

        $form = $this->createForm(CategoryType::class, $cat);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();

            $this->addFlash('success', 'Category updated');

            return $this->redirectToRoute('view_cats');

        }

        return $this->render('admin/cat/update_cat.html.twig',[
            'cat' => $cat,
            'form' => $form->createView(),
        ]);
    }

    //Subcategories

    /**
     * @route("/view_subcats", name="view_subcats")
     *
     */
    public function view_subcats()
    {
        $em = $this->getDoctrine()->getManager();

        $subcats = $em->getRepository(BSwSubcat::class)->findAll();

        return $this->render('admin/cat/view_subcats.html.twig',[
            'subcats' => $subcats,
        ]);
    }

    /**
     * @route("/update_subcat/{subcatId}", name="update_subcat")
     */
    public function update_subcat(Request $request, $subcatId)
    {
        $em = $this->getDoctrine()->getManager();
        $sc = $em->getRepository(BSwSubcat::class)->find($subcatId);

        $form = $this->createForm(SubCategoryType::class, $sc);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();

            $this->addFlash('sucess', 'Subcategory updated!');

            return $this->redirectToRoute('view_subcats');
        }

        return $this->render('admin/cat/update_subcat.html.twig', [
            'sc' => $sc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/add_subcat", name="add_subcat")
     */
    public function add_subcat(Request $request)
    {
        $sc = new BSwSubcat();

        $form = $this->createForm(SubCategoryType::class, $sc);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($sc);
            $em->flush();

            $this->addFlash('success', 'Subcategory added!');

            return $this->redirectToRoute('view_subcats');
        }

        return $this->render('admin/cat/add_subcat.html.twig', [
            'form' => $form->createView(),
            'sc' => $sc,
        ]);
    }
}