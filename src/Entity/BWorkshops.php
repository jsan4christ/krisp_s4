<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BWorkshops
 *
 * @ORM\Table(name="b_workshops")
 * @ORM\Entity
 */
class BWorkshops
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
     * @ORM\Column(name="name", type="text", length=16777215, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="text", length=16777215, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="text", length=16777215, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="text", length=255, nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=true)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="venue", type="text", length=16777215, nullable=true)
     */
    private $venue;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="text", length=65535, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", length=16777215, nullable=true)
     */
    private $link;

    /**
     * @var integer
     *
     * @ORM\Column(name="newsid", type="integer", nullable=true)
     */
    private $newsid;

    /**
     * @var string
     *
     * @ORM\Column(name="feature", type="string", length=1, nullable=true)
     */
    private $feature;


}

