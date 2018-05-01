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
     * @ORM\OneToMany(targetEntity="App\Entity\BSwExpert", mappedBy="person", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $expertise;


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

    public function addExpertise(BSwExpert $expertise)//using expertise_ for each expertise an individual has
    {
        if (!$this->expertise->contains($expertise)) {
            $this->expertise->add($expertise);
            $expertise->setPerson($this);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getSummary2(): string
    {
        return $this->summary2;
    }

    /**
     * @param string $summary2
     */
    public function setSummary2(string $summary2)
    {
        $this->summary2 = $summary2;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getInitials(): string
    {
        return $this->initials;
    }

    /**
     * @param string $initials
     */
    public function setInitials(string $initials)
    {
        $this->initials = $initials;
    }

    /**
     * @return string
     */
    public function getPhoto2(): string
    {
        return $this->photo2;
    }

    /**
     * @param string $photo2
     */
    public function setPhoto2(string $photo2)
    {
        $this->photo2 = $photo2;
    }

    /**
     * @return int
     */
    public function getBioafricasaturn(): int
    {
        return $this->bioafricasaturn;
    }

    /**
     * @param int $bioafricasaturn
     */
    public function setBioafricasaturn(int $bioafricasaturn)
    {
        $this->bioafricasaturn = $bioafricasaturn;
    }

    /**
     * @param mixed $expertise
     */
    public function setExpertise($expertise)
    {
        $this->expertise = $expertise;
    }

    /**
     * @return string
     */
    public function getMember(): string
    {
        return $this->member;
    }

    /**
     * @param string $member
     */
    public function setMember(string $member)
    {
        $this->member = $member;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
    }


    public function getSoftwareDetails()
    {
        return array_map(
            function ($expertise) {//using expertise_ for each expertise an individual has
                return $expertise->getSoftware();
            },
            $this->expertise->toArray()
        );
    }

}

