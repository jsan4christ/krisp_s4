<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BCasebook
 *
 * @ORM\Table(name="b_casebook")
 * @ORM\Entity
 */
class BCasebook
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
     * @ORM\Column(name="title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", length=255, nullable=true)
     */
    private $link;


}

