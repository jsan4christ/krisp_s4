<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BWebadminMainOrgnInfo
 *
 * @ORM\Table(name="b_webadmin_main_orgn_info")
 * @ORM\Entity
 */
class BWebadminMainOrgnInfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="org_no", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orgNo = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_date", type="datetime", nullable=false)
     */
    private $regDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="reg_status", type="text", length=65535, nullable=false)
     */
    private $regStatus;

    /**
     * @var array
     *
     * @ORM\Column(name="org_type", type="simple_array", nullable=false)
     */
    private $orgType = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="reg_country", type="boolean", nullable=false)
     */
    private $regCountry = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="phy_address", type="text", length=65535, nullable=true)
     */
    private $phyAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="post_address", type="text", length=65535, nullable=true)
     */
    private $postAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=30, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="spoc", type="string", length=30, nullable=true)
     */
    private $spoc;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=150, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="done_by", type="string", length=20, nullable=false)
     */
    private $doneBy = '';

    /**
     * @var string
     *
     * @ORM\Column(name="main_org", type="string", nullable=false)
     */
    private $mainOrg = 'Yes';


}

