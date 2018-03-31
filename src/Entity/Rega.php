<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rega
 *
 * @ORM\Table(name="rega")
 * @ORM\Entity
 */
class Rega
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Regav3resultCG", type="text", length=255, nullable=true)
     */
    private $regav3resultcg;

    /**
     * @var string
     *
     * @ORM\Column(name="Regav3resultPOL", type="text", length=255, nullable=true)
     */
    private $regav3resultpol;

    /**
     * @var string
     *
     * @ORM\Column(name="`exclusion reason`", type="text", nullable=true)
     */
    private $exclusionReason;


}

