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


}

