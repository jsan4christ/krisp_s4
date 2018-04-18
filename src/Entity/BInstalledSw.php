<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * BInstalledSw
 * @ORM\Entity(repositoryClass="App\Repository\SoftwareRepository")
 * @ORM\Table(name="b_installed_sw")
 *
 * @author San Emmanuel James <sanemmanueljames@gmail.com>
 */
class BInstalledSw
{
    //max number of software retrieved
    const NUM_ITEMS = 30;

    /**
     * @var integer
     *
     * @ORM\Column(name="sw_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $swId;

    /**
     * @var string
     *
     * @ORM\Column(name="sw_name", type="string", length=50, nullable=false)
     */
    private $swName;

    /**
     * @var string
     *
     * @ORM\Column(name="sw_url", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    private $swUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="sw_desc", type="string", length=200, nullable=false)
     */
    private $swDesc;

    /**
     * Many software belong to one category
     * @ORM\ManyToOne(targetEntity="App\Entity\BSwCat", inversedBy="softwares")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     */
    private $category;

    /**
     * Many software belong to one sub category
     * @ORM\ManyToOne(targetEntity="App\Entity\BSwSubcat", inversedBy="softwares")
     * @ORM\JoinColumn(name="subcat_id", referencedColumnName="subcat_id")
     */
    private $subcategory;

    /**
     * * Many software have multiple experts
     * @var BSwExpert[]\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\BSwExpert", mappedBy="software", cascade={"persist"})
     */
    private $experts;

    /**
     * One software has many install locations
     *
     * @ORM\OneToMany(targetEntity="App\Entity\BSwInstLocn", mappedBy="software", orphanRemoval=TRUE)
     */
    private $locations;

    /**
     * One software has many commands
     *
     * @ORM\OneToMany(targetEntity="App\Entity\BSwCmds", mappedBy="software", orphanRemoval=TRUE)
     */
    private  $commands;


    public function __construct()
    {
        $this->experts = new ArrayCollection();
        $this->locations = new ArrayCollection();
        $this->commands = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getSwId(): int
    {
        return $this->swId;
    }


    public function getSwName(): ?string
    {
        return $this->swName;
    }


    public function setSwName(string $swName)
    {
        $this->swName = $swName;
    }


    public function getSwUrl(): ?string
    {
        return $this->swUrl;
    }

    /**
     * @param string $swUrl
     */
    public function setSwUrl(string $swUrl)
    {
        $this->swUrl = $swUrl;
    }


    public function getSwDesc(): ?string
    {
        return $this->swDesc;
    }

    /**
     * @param string $swDesc
     */
    public function setSwDesc(string $swDesc)
    {
        $this->swDesc = $swDesc;
    }


    public function getCategory()
    {
        return $this->category;
    }


    public function setCategory($category)
    {
        $this->category = $category;
    }


    public function getSubcategory()
    {
        return $this->subcategory;
    }


    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }


    public function getExperts(): Collection
    {
        return $this->experts;
    }

    public function getLocations()
    {
        $this->locations->toArray();
    }

}

