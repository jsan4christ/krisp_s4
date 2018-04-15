<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/15
 * Time: 13:21
 */

namespace App\Controller\Admin;

use App\Entity\BSwCat;
use App\Form\CategoryType;
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



    //Subcategories
}