<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSw
 *
 * @ORM\Table(name="b_sw")
 * @ORM\Entity
 */
class BSw
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sw_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $swId;

    /**
     * @var string
     *
     * @ORM\Column(name="sw_name", type="string", length=50, nullable=false)
     */
    private $swName;


}

