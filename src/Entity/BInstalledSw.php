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
 * @ORM\Entity
 *
 * @author San Emmanuel James <sanemmanueljames@gmail.com>
 */
class BInstalledSw
{
    //max number of latest software retrieved
    const NUM_ITEMS = 9;

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
     * @ORM\OneToMany(targetEntity="App\Entity\BSwExpert", mappedBy="sw", cascade={"persist"})
     * @ORM\OrderBy({"id" : "ASC"})
     */
    private $experts;

    /**
     * One software has many install locations
     *
     * @ORM\OneToMany(targetEntity="App\Entity\BSwInstLocn", mappedBy="software")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id")
     */
    private $locations;

    /**
     * One software has many commands
     *
     * @ORM\OneToMany(targetEntity="App\Entity\BSwCmds", mappedBy="software")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id")
     */
    private  $commands;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $one;


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

    /**
     * @return string
     */
    public function getSwName(): string
    {
        return $this->swName;
    }

    /**
     * @param string $swName
     */
    public function setSwName(string $swName)
    {
        $this->swName = $swName;
    }

    /**
     * @return string
     */
    public function getSwUrl(): string
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

    /**
     * @return string
     */
    public function getSwDesc(): string
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

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * @param mixed $subcategory
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }


    public function getExperts(): Collection
    {
        return $this->experts;
    }


}

