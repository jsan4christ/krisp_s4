<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BPublications
 *
 * @ORM\Table(name="b_publications")
 * @ORM\Entity
 */
class BPublications
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
     * @ORM\Column(name="authors", type="text", nullable=true)
     */
    private $authors;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text", nullable=true)
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="journal", type="string", length=50, nullable=true)
     */
    private $journal;

    /**
     * @var string
     *
     * @ORM\Column(name="volume", type="text", nullable=true)
     */
    private $volume;

    /**
     * @var integer
     *
     * @ORM\Column(name="citations", type="integer", nullable=true)
     */
    private $citations;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=50, nullable=true)
     */
    private $file;

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
     * @var string
     *
     * @ORM\Column(name="pages", type="text", length=255, nullable=true)
     */
    private $pages;

    /**
     * @var string
     *
     * @ORM\Column(name="datafile", type="text", length=255, nullable=true)
     */
    private $datafile;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="doi", type="text", length=255, nullable=true)
     */
    private $doi;

    /**
     * @var float
     *
     * @ORM\Column(name="impact", type="float", precision=10, scale=0, nullable=true)
     */
    private $impact;

    /**
     * @var integer
     *
     * @ORM\Column(name="bioafricaSATuRN", type="integer", nullable=true)
     */
    private $bioafricasaturn;

    /**
     * @var integer
     *
     * @ORM\Column(name="video", type="integer", nullable=true)
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\Column(name="shorttitle", type="text", nullable=true)
     */
    private $shorttitle;

    /**
     * @var string
     *
     * @ORM\Column(name="feature", type="string", length=1, nullable=true)
     */
    private $feature = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="projectid", type="integer", nullable=true)
     */
    private $projectid;


}

