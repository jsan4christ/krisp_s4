<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSwCmds
 *
 * @ORM\Table(name="b_sw_cmds", uniqueConstraints={@ORM\UniqueConstraint(name="ix_ReversePK", columns={"cmd_id", "sw_id"})})
 * @ORM\Entity
 */
class BSwCmds
{
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\BInstalledSw", inversedBy="commands")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id")
     */
    private $software;

    /**
     * @var integer
     *
     * @ORM\Column(name="cmd_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cmdId;

    /**
     * @var string
     *
     * @ORM\Column(name="cmd_name", type="string", length=25, nullable=false)
     *
     */

    private $cmdName;

    /**
     * @var integer
     *
     * @ORM\Column(name="cmd_active", type="integer")
     */
    private $cmdActive;

    /**
     * @return int
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * @param int $software
     */
    public function setSoftware(BInstalledSw $software)
    {
        $this->software = $software;
    }

    /**
     * @return int
     */
    public function getCmdId(): ?int
    {
        return $this->cmdId;
    }


    /**
     * @return string
     */
    public function getCmdName(): ?string
    {
        return $this->cmdName;
    }

    /**
     * @param string $cmdName
     */
    public function setCmdName(string $cmdName)
    {
        $this->cmdName = $cmdName;
    }

    /**
     * @return int
     */
    public function getCmdActive(): ?int
    {
        return $this->cmdActive;
    }

    /**
     * @param int $cmdActive
     */
    public function setCmdActive(int $cmdActive)
    {
        $this->cmdActive = $cmdActive;
    }


}

