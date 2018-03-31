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
     * @ORM\OneToMany(targetEntity="App\Entity\BInstalledSw", mappedBy="BSwSubcat")
     */
    private $BInstalledSw;

    public function __construct()
    {
        $this->BInstalledSw = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|BInstalledSw[]
     */
    public function getBInstalledSw()
    {
        return $this->BInstalledSw;
    }
    /**
     * @return int
     */
    public function getSubcatId(): int
    {
        return $this->subcatId;
    }

     /**
     * @return string
     */
    public function getSubcatName(): string
    {
        return $this->subcatName;
    }

    /**
     * @param string $subcatName
     */
    public function setSubcatName(string $subcatName)
    {
        $this->subcatName = $subcatName;
    }
}

