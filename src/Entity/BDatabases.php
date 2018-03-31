<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BDatabases
 *
 * @ORM\Table(name="b_databases")
 * @ORM\Entity
 */
class BDatabases
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

