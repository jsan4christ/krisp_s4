<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/23
 * Time: 04:08
 */

namespace App\Controller\Admin;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class TeamController
 * @package App\Controller\Admin
 * @route("/team")
 */

class TeamController extends AbstractController
{
    /**
     * @route("/view_all", name="view_all_team")
     *
     */
    public function view_all()
    {

    }

    /**
     * @route("/reg_admin", name="reg_admin")
     * @Method({"POST", "GET"})
     */
    public  function reg_admin(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $admin = new User();
        $form = $this->createForm(UserType::class, $admin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($admin, $admin->getPlainPassword());
            $admin->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            //add here code to send confirmation email to user

            $this->addFlash('success', 'Admin added!');

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/team/reg_admin.html.twig',[
            'admin' => $admin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/update_admin/{admin_id}", name="update_profile")
     */
    public function update_admin(Request $request, $admin_id, UserPasswordEncoderInterface $pe)
    {
        $em = $this->getDoctrine();
        $admin = $em->getRepository(User::class)->find($admin_id);

        $form = $this->createForm(UserType::class, $admin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $password = $pe->encodePassword($admin, $admin->getPlainPassword());
            $admin->setPassword($password);

            $em->getManager()->flush();

            $this->addFlash('success', 'Details updated successfully');

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/team/update_profile.html.twig', [
            'admin' => $admin,
            'form' => $form->createView()
        ]);
    }
}