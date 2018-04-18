<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * BSwSubcat
 *
 * @ORM\Table(name="b_sw_subcat")
 * @ORM\Entity
 */
class BSwSubcat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="subcat_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subcatId;

    /**
     * @var string
     *
     * @ORM\Column(name="subcat_name", type="string", length=50, nullable=false)
     */
    private $subcatName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BInstalledSw", mappedBy="subcategory")
     */
    private $softwares;

    public function __construct()
    {
        $this->softwares = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|softwares[]
     */
    public function getInstalledSw()
    {
        return $this->softwares;
    }
    /**
     * @return int
     */
    public function getSubcatId(): int
    {
        return $this->subcatId;
    }


    public function getSubcatName(): ?string
    {
        return $this->subcatName;
    }

    public function setSubcatName(string $subcatName)
    {
        $this->subcatName = $subcatName;
    }
}

