<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BResourcesPpt
 *
 * @ORM\Table(name="b_resources_ppt")
 * @ORM\Entity
 */
class BResourcesPpt
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
     * @ORM\Column(name="pict", type="text", length=255, nullable=true)
     */
    private $pict;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var integer
     *
     * @ORM\Column(name="pubid", type="integer", nullable=true)
     */
    private $pubid;

    /**
     * @var integer
     *
     * @ORM\Column(name="feature", type="integer", nullable=true)
     */
    private $feature;

    /**
     * @var string
     *
     * @ORM\Column(name="pptfile", type="text", length=255, nullable=true)
     */
    private $pptfile;


}

