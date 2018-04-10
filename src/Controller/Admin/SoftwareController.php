<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 03:13
 */

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class SoftwareController
 * @package App\Controller\Admin
 * @route("/software")
 * @security("has_role('ROLE_ADMIN')")
 */
class SoftwareController extends AbstractController
{

    /**
     * Show Software
     * @route("/view_software")
     */
    public function view_installed_software()
    {

    }


    /**
     * Add software
     * @route("/new")
     */
    public function new()
    {
        
    }

}