<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BProjects
 *
 * @ORM\Table(name="b_projects")
 * @ORM\Entity
 */
class BProjects
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
     * @ORM\Column(name="title", type="text", nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="short", type="string", length=50, nullable=true)
     */
    private $short;

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="text", length=16777215, nullable=true)
     */
    private $webpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", length=65535, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="people", type="text", length=16777215, nullable=true)
     */
    private $people;

    /**
     * @var string
     *
     * @ORM\Column(name="funder", type="text", length=16777215, nullable=true)
     */
    private $funder;

    /**
     * @var string
     *
     * @ORM\Column(name="expertise", type="text", nullable=true)
     */
    private $expertise;

    /**
     * @var string
     *
     * @ORM\Column(name="externalPI", type="text", length=16777215, nullable=true)
     */
    private $externalpi;


}

