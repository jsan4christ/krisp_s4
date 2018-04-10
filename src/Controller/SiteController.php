<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/03
 * Time: 14:56
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SiteController
 * @package App\Controller
 *
 */
class SiteController extends AbstractController
{
    /**
     *  @Route("/", defaults={"_format"="html"}, name="site_index")
     *
     */
    public function index()
    {
        return $this->render('site/index.html.twig', [
            'title' => 'KRISP Home page',
        ]);
    }
}