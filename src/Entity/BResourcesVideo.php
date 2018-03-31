<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BResourcesVideo
 *
 * @ORM\Table(name="b_resources_video")
 * @ORM\Entity
 */
class BResourcesVideo
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
     * @ORM\Column(name="author", type="text", length=16777215, nullable=true)
     */
    private $author;

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
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="feature", type="integer", nullable=true)
     */
    private $feature;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="text", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="text", length=255, nullable=true)
     */
    private $file;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duration", type="time", nullable=true)
     */
    private $duration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;


}

