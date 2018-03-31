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
     * @ORM\Column(name="sw_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $swId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cmd_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmdId;


}

