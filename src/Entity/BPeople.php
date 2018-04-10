<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BPeople
 *
 * @ORM\Table(name="b_people", indexes={@ORM\Index(name="researcher", columns={"name"})})
 * @ORM\Entity
 */
class BPeople
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=50, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=40, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="summary2", type="text", nullable=true)
     */
    private $summary2;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=50, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="initials", type="string", length=10, nullable=true)
     */
    private $initials;

    /**
     * @var string
     *
     * @ORM\Column(name="photo2", type="text", length=255, nullable=true)
     */
    private $photo2;

    /**
     * @var integer
     *
     * @ORM\Column(name="bioafricaSATuRN", type="integer", nullable=true)
     */
    private $bioafricasaturn;

    /**
     * @var string
     *
     * @ORM\Column(name="member", type="text", length=255, nullable=false)
     */
    private $member;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="text", length=65535, nullable=true)
     */
    private $category;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BSwExpert", mappedBy="person", cascade={"persist"})
     */
    protected $expertise;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BInstalledSw", mappedBy="software", cascade={"persist"}
     */

    /**
     * BPeople constructor.
     */

    public function __construct()
    {
        $this->expertise = new ArrayCollection();
    }

    public function getExpertise()
    {
        return $this->expertise->toArray();
    }

    public function addExpertise(Expertise_ $expertise_)//using expertise_ for each expertise an individual has
    {
        if (!$this->expertise->contains($expertise_)) {
            $this->expertise->add($expertise_);
            $expertise_->setBPeople($this);
        }

        return $this;
    }


    public function getSoftwareDetails()
    {
        return array_map(
            function ($expertise_) {//using expertise_ for each expertise an individual has
                return $expertise_->getBInstalledSw();
            },
            $this->expertise->toArray()
        );
    }

}

