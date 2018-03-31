<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * BSwCat
 *
 * @ORM\Table(name="b_sw_cat")
 * @ORM\Entity
 */
class BSwCat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cat_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catId;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_name", type="string", length=50, nullable=false)
     */
    private $catName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BInstalledSw", mappedBy="BSwCat")
     */
    private $BinstalledSw;

    public function __construct()
    {
        $this->BInstalledSw = new ArrayCollection();
    }
    /**
     * @return Collection|BInstalledSw[]
     */
    public function getBInstalledSw()
    {
        return $this->BInstalledSw;
    }

    //getters and setters

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->catName;
    }

    /**
     * @param string $catName
     */
    public function setCatName(string $catName)
    {
        $this->catName = $catName;
    }



}

