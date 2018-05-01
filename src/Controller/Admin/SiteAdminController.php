<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/03
 * Time: 14:57
 */

namespace App\Controller\Admin;



use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\UserType;
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
        return $this->render('admin/admin/home.html.twig',[
            'title' => 'Admin Home'
        ]);
    }
    ########################End admin panel main################

    ########################Begin Manage Own Profile###################

    /**
     * View logged in user profile. Should only view own profile.
     *
     * @route("/profile/{id}", name="logged_admin_in_profile")
     */
    public function my_profile( int $id)
    {
        $loggedInUser = $this->getUser()->getId();
        if($id === $loggedInUser){
            $em = $this->getDoctrine()->getManager();
            $profile = $em->find(User::class, $id);
        }else{
            $this->addFlash('warning', 'You tried to view a profile that is not yours, please login to view your profile!');
            return $this->redirectToRoute('security_login');
        }

        return $this->render('admin/admin/profile.html.twig', [
            'profile'=> $profile,
        ]);
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

        return $this->render('admin/admin/reg_admin.html.twig',[
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

        return $this->render('admin/admin/update_profile.html.twig', [
            'admin' => $admin,
            'form' => $form->createView()
        ]);
    }
    ########################End Manage Own Profile######################

}

