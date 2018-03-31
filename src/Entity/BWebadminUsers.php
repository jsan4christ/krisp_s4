<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BWebadminUsers
 *
 * @ORM\Table(name="b_webadmin_users")
 * @ORM\Entity
 */
class BWebadminUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="identifier", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifier = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_date", type="datetime", nullable=true)
     */
    private $regDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=30, nullable=false)
     */
    private $firstname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=30, nullable=false)
     */
    private $lastname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=30, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="change_password", type="string", nullable=false)
     */
    private $changePassword = 'No';

    /**
     * @var string
     *
     * @ORM\Column(name="account_status", type="string", nullable=false)
     */
    private $accountStatus = 'Inactive';


}

