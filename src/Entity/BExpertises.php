<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BExpertises
 *
 * @ORM\Table(name="b_expertises")
 * @ORM\Entity
 */
class BExpertises
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
     * @var integer
     *
     * @ORM\Column(name="topics_1", type="integer", nullable=true)
     */
    private $topics1;


}

