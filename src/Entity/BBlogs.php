<?php

// src/Entity/BBlogs.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BBlogs
 *
 * @ORM\Table(name="b_blogs")
 * @ORM\Entity
 */
class BBlogs
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
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="summary2", type="text", nullable=true)
     */
    private $summary2;

    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="text", nullable=true)
     */
    private $authors;

    /**
     * @var string
     *
     * @ORM\Column(name="photo2", type="text", length=255, nullable=true)
     */
    private $photo2;

    /**
     * @var integer
     *
     * @ORM\Column(name="bioafricaSATuRN", type="integer", nullable=true)
     */
    private $bioafricasaturn;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

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
     * @ORM\Column(name="video", type="text", nullable=true)
     */
    private $video;

    /**
     * @var integer
     *
     * @ORM\Column(name="pubid", type="integer", nullable=true)
     */
    private $pubid;

    /**
     * @var string
     *
     * @ORM\Column(name="imagefront", type="string", length=100, nullable=true)
     */
    private $imagefront;



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getSummary2(): string
    {
        return $this->summary2;
    }

    /**
     * @param string $summary2
     */
    public function setSummary2(string $summary2)
    {
        $this->summary2 = $summary2;
    }

    /**
     * @return string
     */
    public function getAuthors(): string
    {
        return $this->authors;
    }

    /**
     * @param string $authors
     */
    public function setAuthors(string $authors)
    {
        $this->authors = $authors;
    }

    /**
     * @return string
     */
    public function getPhoto2(): string
    {
        return $this->photo2;
    }

    /**
     * @param string $photo2
     */
    public function setPhoto2(string $photo2)
    {
        $this->photo2 = $photo2;
    }

    /**
     * @return int
     */
    public function getBioafricasaturn(): int
    {
        return $this->bioafricasaturn;
    }

    /**
     * @param int $bioafricasaturn
     */
    public function setBioafricasaturn(int $bioafricasaturn)
    {
        $this->bioafricasaturn = $bioafricasaturn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords(string $keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getTopdescription(): string
    {
        return $this->topdescription;
    }

    /**
     * @param string $topdescription
     */
    public function setTopdescription(string $topdescription)
    {
        $this->topdescription = $topdescription;
    }

    /**
     * @return string
     */
    public function getVideo(): string
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo(string $video)
    {
        $this->video = $video;
    }

    /**
     * @return int
     */
    public function getPubid(): int
    {
        return $this->pubid;
    }

    /**
     * @param int $pubid
     */
    public function setPubid(int $pubid)
    {
        $this->pubid = $pubid;
    }

    /**
     * @return string
     */
    public function getImagefront(): string
    {
        return $this->imagefront;
    }

    /**
     * @param string $imagefront
     */
    public function setImagefront(string $imagefront)
    {
        $this->imagefront = $imagefront;
    }
}

