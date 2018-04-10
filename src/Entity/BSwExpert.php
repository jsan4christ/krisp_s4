<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSwExpert
 *
 * @ORM\Entity(repositoryClass="App\Repository\BSwExpertsRepository")
 * @ORM\Table(name="b_sw_expert", uniqueConstraints={@ORM\UniqueConstraint(name="ix_ReversePK", columns={"sw_id", "id"})}, indexes={@ORM\Index(name="IDX_6FDF8FF617B8E905", columns={"sw_id"})})

 */

class BSwExpert
{
    /**
     * Many experts matche one person
     * @var int
     * @ORM\id
     * @ORM\ManyToOne(targetEntity="App\Entity\BPeople", inversedBy="expertise")
     * @ORM\JoinColumn(name="id", referencedColumnName="id", nullable=FALSE)
     */
    private $person;

    /**
     * @var int
     * @ORM\id
     * @ORM\ManyToOne(targetEntity="App\Entity\BInstalledSw", inversedBy="experts")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id", nullable=FALSE)
     */
    protected $software;

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

    /**
     * @return int
     */
    public function getSw(): int
    {
        return $this->sw;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }


}
