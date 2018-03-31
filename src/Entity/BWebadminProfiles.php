<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BWebadminProfiles
 *
 * @ORM\Table(name="b_webadmin_profiles")
 * @ORM\Entity
 */
class BWebadminProfiles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="profile_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $profileId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="string", length=20, nullable=false)
     */
    private $profile = '';

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="text", length=16777215, nullable=false)
     */
    private $remarks;


}

