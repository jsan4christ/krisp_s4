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
     * @var integer
     * @ORM\ManyToOne(targetEntity="App\Entity\BInstalledSw", inversedBy="locations")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id")
     * @ORM\Id
     */
    private $software;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="App\Entity\BServer", inversedBy="locations")
     * @ORM\Column(name="svr_id", type="smallint")
     * @ORM\Id

     */
    private $server;

    public function __construct($swId, $svrId)
    {
        $this->swId = $swId;
        $this->svrId = $svrId;
    }

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


}

