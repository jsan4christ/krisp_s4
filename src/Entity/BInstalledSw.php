<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * Many software belongs to one category
     * @ORM\ManyToOne(targetEntity="App\Entity\BSwCat", inversedBy="BInstalledSw")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     */
    private $catId;

    /**
     * Each software belongs to one sub category
     * @ORM\ManyToOne(targetEntity="App\Entity\BSwSubcat", inversedBy="BInstalledSw")
     * @ORM\JoinColumn(name="subcat_id", referencedColumnName="subcat_id")
     */
    private $subcatId;

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
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     */
    public function setCatId(int $catId)
    {
        $this->catId = $catId;
    }

    /**
     * @return int
     */
    public function getSubcatId(): int
    {
        return $this->subcatId;
    }

    /**
     * @param int $subcatId
     */
    public function setSubcatId(int $subcatId)
    {
        $this->subcatId = $subcatId;
    }


}

