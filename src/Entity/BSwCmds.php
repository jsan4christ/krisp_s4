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

    public function __construct($software)
    {
        $this->software = $software;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="cmd_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmdId;

    /**
     * @var string
     *
     * @ORM\Column(name="cmd_name", type="string", length=25, nullable=false)
     */

    private $cmdName;

    /**
     * @var integer
     *
     * @ORM\Column(name="cmd_active", type="integer")
     */
    private $cmdActive;


}

