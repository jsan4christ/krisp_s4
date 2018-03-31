<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BWebadminObjectProfile
 *
 * @ORM\Table(name="b_webadmin_object_profile")
 * @ORM\Entity
 */
class BWebadminObjectProfile
{
    /**
     * @var string
     *
     * @ORM\Column(name="object", type="string", length=250)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $object;

    /**
     * @var integer
     *
     * @ORM\Column(name="profile_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $profileId = '0';


}

