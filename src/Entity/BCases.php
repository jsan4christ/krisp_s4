<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BCases
 *
 * @ORM\Table(name="b_cases")
 * @ORM\Entity
 */
class BCases
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
     * @ORM\Column(name="description1", type="text", nullable=true)
     */
    private $description1;

    /**
     * @var string
     *
     * @ORM\Column(name="imagechart1", type="text", length=255, nullable=true)
     */
    private $imagechart1;

    /**
     * @var string
     *
     * @ORM\Column(name="imageHIVDR1", type="text", length=255, nullable=true)
     */
    private $imagehivdr1;

    /**
     * @var string
     *
     * @ORM\Column(name="GSSscore1", type="text", nullable=true)
     */
    private $gssscore1;

    /**
     * @var string
     *
     * @ORM\Column(name="interpretation2", type="text", nullable=true)
     */
    private $interpretation2;

    /**
     * @var string
     *
     * @ORM\Column(name="recommendation2", type="text", nullable=true)
     */
    private $recommendation2;

    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="text", nullable=true)
     */
    private $authors;

    /**
     * @var string
     *
     * @ORM\Column(name="questions2", type="text", nullable=true)
     */
    private $questions2;

    /**
     * @var string
     *
     * @ORM\Column(name="answers3", type="text", nullable=true)
     */
    private $answers3;

    /**
     * @var string
     *
     * @ORM\Column(name="keylearn3", type="text", nullable=true)
     */
    private $keylearn3;

    /**
     * @var string
     *
     * @ORM\Column(name="title1", type="text", nullable=true)
     */
    private $title1;

    /**
     * @var string
     *
     * @ORM\Column(name="interpretation1", type="text", nullable=true)
     */
    private $interpretation1;

    /**
     * @var string
     *
     * @ORM\Column(name="org", type="string", length=5, nullable=true)
     */
    private $org;

    /**
     * @var integer
     *
     * @ORM\Column(name="caseid", type="integer", nullable=true)
     */
    private $caseid;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="topdescription", type="text", nullable=true)
     */
    private $topdescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;


}

