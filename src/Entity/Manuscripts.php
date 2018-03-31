<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manuscripts
 *
 * @ORM\Table(name="manuscripts")
 * @ORM\Entity
 */
class Manuscripts
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
     * @ORM\Column(name="PMID", type="integer", nullable=true)
     */
    private $pmid;

    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="text", nullable=true)
     */
    private $authors;

    /**
     * @var string
     *
     * @ORM\Column(name="journal", type="text", nullable=true)
     */
    private $journal;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="text", nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="CRF", type="integer", nullable=true)
     */
    private $crf;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text", nullable=true)
     */
    private $abstract;


}

