<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BWebadminUserProfiles
 *
 * @ORM\Table(name="b_webadmin_user_profiles")
 * @ORM\Entity
 */
class BWebadminUserProfiles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="profile_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $profileId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $username = '';


}

