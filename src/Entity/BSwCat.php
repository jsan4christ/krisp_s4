<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BSwCatRepository")
 * @ORM\Table(name="b_sw_cat")
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
     * @ORM\OneToMany(targetEntity="App\Entity\BInstalledSw", mappedBy="category")
     */
    protected $softwares;

    public function __construct()
    {
        $this->softwares = new ArrayCollection();
    }

    //getters and setters

    /**
     * @return Collection|softwares[]
     */
    public function getInstalledSoftwares()
    {
        return $this->softwares;
    }


    public function getCatId(): int
    {
        return $this->catId;
    }


    public function getCatName(): ?string
    {
        return $this->catName;
    }


    public function setCatName(string $catName)
    {
        $this->catName = $catName;
    }



}

