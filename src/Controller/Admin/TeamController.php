<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/23
 * Time: 04:08
 */

namespace App\Controller\Admin;



use App\Entity\BPeople;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

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
    public function view_all()
    {
        $em = $this->getDoctrine()->getManager();

        $team = $em->getRepository(BPeople::class)->findAll();

        $form = $this->createForm(TeamType::class, $team);
    }


}