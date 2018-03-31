<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BGrantsResults
 *
 * @ORM\Table(name="b_grants_results")
 * @ORM\Entity
 */
class BGrantsResults
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
     * @ORM\Column(name="result", type="string", length=100, nullable=true)
     */
    private $result;


}

