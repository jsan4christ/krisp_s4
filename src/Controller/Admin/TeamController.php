<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/23
 * Time: 04:08
 */

namespace App\Controller\Admin;



use App\Entity\BPeople;
use App\Form\TeamType;
use App\Repository\TeamRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use App\Service\FileUploader;

/**
 * Class TeamController
 * @package App\Controller\Admin
 * @route("/team")
 */

class TeamController extends AbstractController
{
    /**
     * @route("/view_team", name="view_all_team")
     *
     */
    public function view_all(TeamRepository $team)
    {

        //$team = $team->findAll();
        $team = $team->findBy(
            ['member' => 'current'],
            ['id' => 'ASC']
        );

        return $this->render('admin/team/view_team.html.twig', [
            'team' => $team
        ]);
    }


    /**
     * @route("/view_member_detail/{id}", name="view_member_detail")
     */
    public function view_member_detail(BPeople $p)
    {
        return $this->render('admin/team/view_member_detail.html.twig', [
            'p' => $p
        ]);
    }

    /**
     * @route("/add_new_member", name="add_new_member")
     */
    public function add_new_member(Request $request, FileUploader $fp)
    {
        $member = new BPeople();

        $form = $this->createForm(TeamType::class, $member);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($member->getImage()){
                $emoji = $member->getImage();
                $emojiName = $member->getImage()->getClientOriginalName();
                $emoji->move($fp->getTargetDirectory(), $emojiName);
                $member->setImage($emojiName);
            }

            if($member->getPhoto2()){
                $photo = $member->getPhoto2();
                $photoName = $member->getPhoto2()->getClientOriginalName();
                $photo->move($fp->getTargetDirectory(), $photoName);
                $member->setPhoto2($photoName);
            }

            $this->getDoctrine()->getManager()->persist($member);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Member added successfully');

            return $this->redirectToRoute('view_all_team');
        }

        return $this->render('admin/team/add_new_member.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/update_member/{id}", name="update_member_profile")
     */
    public function update_member( Request $request, BPeople $member, FileUploader $fp)
    {
        $oldEmoji = $member->getImage();
        $oldPhoto = $member->getPhoto2();

        if($oldEmoji){
            $member->setImage(new File($fp->getTargetDirectory().'/'.$oldEmoji));

        }

        if($oldPhoto){
            $member->setPhoto2(new File($fp->getTargetDirectory().'/'.$oldPhoto));

        }
        //dump($member->getImage(), $member->getPhoto2()); die;
        $form = $this->createForm(TeamType::class, $member);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(!is_null($member->getImage())){

            $emoji = $member->getImage();
            $emojiName = $member->getImage()->getClientOriginalName() ;
            $emoji->move($fp->getTargetDirectory(), $emojiName);
            $member->setImage($emojiName);
            }else {
                $member->setImage($oldEmoji);
            }

        if(!is_null($member->getPhoto2())){
            $photo = $member->getPhoto2();
            $photoName = $member->getPhoto2()->getClientOriginalName();
            $photo->move($fp->getTargetDirectory(), $photoName);
            $member->setPhoto2($photoName);
            }else{
            $member->setPhoto2($oldPhoto);
        }

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Member updated successfully');

            return $this->redirectToRoute('view_all_team');
        }

        return $this->render('admin/team/update_member_detail.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}