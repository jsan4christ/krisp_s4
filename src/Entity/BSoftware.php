<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSoftware
 *
 * @ORM\Table(name="b_software")
 * @ORM\Entity
 */
class BSoftware
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="string", length=100, nullable=true)
     */
    private $webpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", nullable=true)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=50, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="text", nullable=true)
     */
    private $authors;

    /**
     * @var integer
     *
     * @ORM\Column(name="pubid", type="integer", nullable=true)
     */
    private $pubid;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="text", length=16777215, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="feature", type="string", length=1, nullable=true)
     */
    private $feature;


}

