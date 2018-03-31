<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BLinks
 *
 * @ORM\Table(name="b_links")
 * @ORM\Entity
 */
class BLinks
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
     * @ORM\Column(name="title", type="text", nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="text", nullable=true)
     */
    private $webpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="bioafricaSATuRN", type="integer", nullable=true)
     */
    private $bioafricasaturn;


}

