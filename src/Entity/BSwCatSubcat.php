<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSwCatSubcat
 *
 * @ORM\Table(name="b_sw_cat_subcat", uniqueConstraints={@ORM\UniqueConstraint(name="ix_ReversePK", columns={"subcat_id", "cat_id"})})
 * @ORM\Entity
 */
class BSwCatSubcat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cat_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $catId;

    /**
     * @var integer
     *
     * @ORM\Column(name="subcat_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $subcatId;

    //getters and setters



}

