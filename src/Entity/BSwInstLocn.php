<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSwInstLocn
 *
 * @ORM\Table(name="b_sw_inst_locn", uniqueConstraints={@ORM\UniqueConstraint(name="ix_ReversePK", columns={"svr_id", "sw_id"})})
 * @ORM\Entity
 */
class BSwInstLocn
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="App\Entity\BInstalledSw", inversedBy="locations")
     * @ORM\JoinColumn(nullable=TRUE)
     */
    private $software;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="App\Entity\BServer", inversedBy="locations")
     * @ORM\JoinColumn(nullable=TRUE)
     */
    private $server;

    /**
     * @var string
     *
     * @ORM\Column(name="install_locn", type="string", length=200, nullable=false)
     */
    private $installLocn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="install_date", type="date", nullable=false)
     */
    private $installDate;

    /**
     * @var string
     *
     * @ORM\Column(name="how_to_load", type="string", length=200, nullable=false)
     */
    private $howToLoad;

    /**
     * @var string
     *
     * @ORM\Column(name="how_to_unload", type="string", length=200, nullable=false)
     */
    private $howToUnload;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSoftware(): int
    {
        return $this->software;
    }

    /**
     * @param int $software
     */
    public function setSoftware(int $software)
    {
        $this->software = $software;
    }

    /**
     * @return int
     */
    public function getServer(): int
    {
        return $this->server;
    }

    /**
     * @param int $server
     */
    public function setServer(int $server)
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getInstallLocn(): string
    {
        return $this->installLocn;
    }

    /**
     * @param string $installLocn
     */
    public function setInstallLocn(string $installLocn)
    {
        $this->installLocn = $installLocn;
    }

    /**
     * @return \DateTime
     */
    public function getInstallDate(): \DateTime
    {
        return $this->installDate;
    }

    /**
     * @param \DateTime $installDate
     */
    public function setInstallDate(\DateTime $installDate)
    {
        $this->installDate = $installDate;
    }

    /**
     * @return string
     */
    public function getHowToLoad(): string
    {
        return $this->howToLoad;
    }

    /**
     * @param string $howToLoad
     */
    public function setHowToLoad(string $howToLoad)
    {
        $this->howToLoad = $howToLoad;
    }

    /**
     * @return string
     */
    public function getHowToUnload(): string
    {
        return $this->howToUnload;
    }

    /**
     * @param string $howToUnload
     */
    public function setHowToUnload(string $howToUnload)
    {
        $this->howToUnload = $howToUnload;
    }


}

