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
     * @var string
     * @ORM\Column(name="issn", type="text", length=100, nullable=true)
     */
    private $issn;

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
    private $feature;

    /**
     * @var integer
     *
     * @ORM\Column(name="projectid", type="integer", nullable=true)
     */
    private $projectid;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getAbstract(): string
    {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract(string $abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     */
    public function getJournal(): string
    {
        return $this->journal;
    }

    /**
     * @param string $journal
     */
    public function setJournal(string $journal)
    {
        $this->journal = $journal;
    }

    /**
     * @return string
     */
    public function getVolume(): ?string
    {
        return $this->volume;
    }

    /**
     * @param string $volume
     */
    public function setVolume(string $volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return int
     */
    public function getCitations(): int
    {
        return $this->citations;
    }

    /**
     * @param int $citations
     */
    public function setCitations(int $citations)
    {
        $this->citations = $citations;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
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
    public function getPages(): string
    {
        return $this->pages;
    }

    /**
     * @param string $pages
     */
    public function setPages(string $pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return string
     */
    public function getDatafile(): string
    {
        return $this->datafile;
    }

    /**
     * @param string $datafile
     */
    public function setDatafile(string $datafile)
    {
        $this->datafile = $datafile;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDoi(): string
    {
        return $this->doi;
    }

    /**
     * @param string $doi
     */
    public function setDoi(string $doi)
    {
        $this->doi = $doi;
    }

    /**
     * @return string
     */
    public function getIssn(): string
    {
        return $this->issn;
    }

    /**
     * @param string $issn
     */
    public function setIssn(string $issn)
    {
        $this->issn = $issn;
    }

    /**
     * @return float
     */
    public function getImpact(): float
    {
        return $this->impact;
    }

    /**
     * @param float $impact
     */
    public function setImpact(float $impact)
    {
        $this->impact = $impact;
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
     * @return int
     */
    public function getVideo(): int
    {
        return $this->video;
    }

    /**
     * @param int $video
     */
    public function setVideo(int $video)
    {
        $this->video = $video;
    }

    /**
     * @return string
     */
    public function getShorttitle(): string
    {
        return $this->shorttitle;
    }

    /**
     * @param string $shorttitle
     */
    public function setShorttitle(string $shorttitle)
    {
        $this->shorttitle = $shorttitle;
    }

    /**
     * @return string
     */
    public function getFeature(): string
    {
        return $this->feature;
    }

    /**
     * @param string $feature
     */
    public function setFeature(string $feature)
    {
        $this->feature = $feature;
    }

    /**
     * @return int
     */
    public function getProjectid(): int
    {
        return $this->projectid;
    }

    /**
     * @param int $projectid
     */
    public function setProjectid(int $projectid)
    {
        $this->projectid = $projectid;
    }


}

