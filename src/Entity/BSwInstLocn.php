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
     * @ORM\Column(type="integer", name="locn_id")
     * @ORM\id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BInstalledSw", inversedBy="locations")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id")
     */
    private $software;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BServer", inversedBy="locations")
     * @ORM\JoinColumn(name="svr_id", referencedColumnName="svr_id")
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

    public  function __construct()
    {
        $this->installDate = new \DateTime();
    }

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


    public function getSoftware()
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

    public function getServer()
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
    public function getInstallLocn(): ?string
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
    public function getHowToLoad(): ?string
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
    public function getHowToUnload(): ?string
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

