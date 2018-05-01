<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * BSwExpert
 *
 * @ORM\Entity(repositoryClass="App\Repository\BSwExpertsRepository")
 * @ORM\Table(name="b_sw_expert", uniqueConstraints={@ORM\UniqueConstraint(name="ix_ReversePK", columns={"sw_id", "p_id"})}, indexes={@ORM\Index(name="IDX_6FDF8FF617B8E905", columns={"sw_id"})})
 * @UniqueEntity(fields={"software" , "person"})
 */

class BSwExpert
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * Many experts match one person
     * @var int
     * @ORM\ManyToOne(targetEntity="App\Entity\BPeople", inversedBy="expertise")
     * @ORM\JoinColumn(name="p_id", referencedColumnName="id", nullable=FALSE)
     */
    private $person;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="App\Entity\BInstalledSw", inversedBy="experts")
     * @ORM\JoinColumn(name="sw_id", referencedColumnName="sw_id", nullable=FALSE)
     */
    protected $software;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=16, nullable=false)
     */

    private  $type;

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getId(): \Ramsey\Uuid\UuidInterface
    {
        return $this->id;
    }

    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     */
    public function setId(\Ramsey\Uuid\UuidInterface $id)
    {
        $this->id = $id;
    }


    public function getPerson()
    {
        return $this->person;
    }

    public function setPerson(BPeople $person = null)
    {
        $this->person = $person;
        return $this;
    }


    public function getSoftware()
    {
        return $this->software;
    }

    public function setSoftware(BInstalledSw $software = null)
    {
        return $this->software = $software;
    }


    /**
     * @return string
     */
    public function getType(): ?string
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
