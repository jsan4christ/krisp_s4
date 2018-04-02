<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSwExpert
 *
 * @ORM\Table(name="b_sw_expert", uniqueConstraints={@ORM\UniqueConstraint(name="ix_ReversePK", columns={"id", "sw_id"})}, indexes={@ORM\Index(name="IDX_6FDF8FF617B8E905", columns={"sw_id"})})
 * @ORM\Entity
 */
class BSwExpert
{
    /**
     * One expert matches one person
     * @ORM\id
     * @ORM\OneToOne(targetEntity="App\Entity\BPeople")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $id;

    /**
     * @var \App\Entity\BInstalledSw
     * @ORM\id
     * @ORM\OneToOne(targetEntity="App\Entity\BInstalledSw")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id")
     */
    private $sw;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */

    private  $type;

    public function __construct($id , $sw)
    {
        $this->id = $id;
        $this->sw = $sw;
    }

    public function getExpertId()
    {
        return $this->id;
    }

    public function getSwId()
    {
        return $this->sw;
    }

}

