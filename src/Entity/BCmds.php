<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BCmds
 *
 * @ORM\Table(name="b_cmds")
 * @ORM\Entity
 */
class BCmds
{
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
     */
    private $cmdName;


}

