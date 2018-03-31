<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Strains
 *
 * @ORM\Table(name="strains")
 * @ORM\Entity
 */
class Strains
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
     * @ORM\Column(name="sequence", type="text", nullable=true)
     */
    private $sequence;

    /**
     * @var string
     *
     * @ORM\Column(name="accession", type="string", length=32, nullable=true)
     */
    private $accession;

    /**
     * @var integer
     *
     * @ORM\Column(name="CRF", type="integer", nullable=true)
     */
    private $crf;

    /**
     * @var integer
     *
     * @ORM\Column(name="image", type="integer", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="seqnames", type="string", length=32, nullable=true)
     */
    private $seqnames;

    /**
     * @var integer
     *
     * @ORM\Column(name="regaref", type="integer", nullable=true)
     */
    private $regaref;

    /**
     * @var string
     *
     * @ORM\Column(name="treeCG", type="text", length=255, nullable=true)
     */
    private $treecg;

    /**
     * @var string
     *
     * @ORM\Column(name="diversityCG", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $diversitycg;

    /**
     * @var string
     *
     * @ORM\Column(name="supportCG", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $supportcg;

    /**
     * @var string
     *
     * @ORM\Column(name="SlDvCG", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $sldvcg;

    /**
     * @var string
     *
     * @ORM\Column(name="dfCG", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $dfcg;

    /**
     * @var string
     *
     * @ORM\Column(name="sgCG", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $sgcg;

    /**
     * @var string
     *
     * @ORM\Column(name="slCG", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $slcg;

    /**
     * @var string
     *
     * @ORM\Column(name="tree", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $tree;

    /**
     * @var string
     *
     * @ORM\Column(name="diversity", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $diversity;

    /**
     * @var string
     *
     * @ORM\Column(name="support", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $support;

    /**
     * @var string
     *
     * @ORM\Column(name="SlDv", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $sldv;

    /**
     * @var string
     *
     * @ORM\Column(name="df", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $df;

    /**
     * @var string
     *
     * @ORM\Column(name="sg", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $sg;

    /**
     * @var string
     *
     * @ORM\Column(name="sl", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $sl;


}

