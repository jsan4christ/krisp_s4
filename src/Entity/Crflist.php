<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crflist
 *
 * @ORM\Table(name="crflist")
 * @ORM\Entity
 */
class Crflist
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
     * @ORM\Column(name="name", type="string", length=10, nullable=true)
     */
    private $name;

    /**
     * @var binary
     *
     * @ORM\Column(name="RegaV3", type="binary", nullable=true)
     */
    private $regav3;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="losdescription", type="text", nullable=true)
     */
    private $losdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="loslink", type="text", nullable=true)
     */
    private $loslink;

    /**
     * @var string
     *
     * @ORM\Column(name="geographic", type="string", length=100, nullable=true)
     */
    private $geographic;

    /**
     * @var string
     *
     * @ORM\Column(name="transmission", type="string", length=50, nullable=true)
     */
    private $transmission;

    /**
     * @var string
     *
     * @ORM\Column(name="epidemiosign", type="string", length=50, nullable=true)
     */
    private $epidemiosign;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberseq", type="integer", nullable=true)
     */
    private $numberseq;

    /**
     * @var string
     *
     * @ORM\Column(name="lossearch", type="string", length=10, nullable=true)
     */
    private $lossearch;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstisolated", type="date", nullable=true)
     */
    private $firstisolated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastisolated", type="date", nullable=true)
     */
    private $lastisolated;

    /**
     * @var string
     *
     * @ORM\Column(name="tree", type="text", length=255, nullable=true)
     */
    private $tree;

    /**
     * @var string
     *
     * @ORM\Column(name="REGAV3map", type="text", length=255, nullable=true)
     */
    private $regav3map;

    /**
     * @var string
     *
     * @ORM\Column(name="losmap", type="text", length=255, nullable=true)
     */
    private $losmap;

    /**
     * @var string
     *
     * @ORM\Column(name="REGAV3link", type="text", length=255, nullable=true)
     */
    private $regav3link;

    /**
     * @var string
     *
     * @ORM\Column(name="exclusion", type="text", nullable=true)
     */
    private $exclusion;

    /**
     * @var binary
     *
     * @ORM\Column(name="phyloV1", type="binary", nullable=true)
     */
    private $phylov1;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberseqCG", type="integer", nullable=true)
     */
    private $numberseqcg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstisolatedCG", type="date", nullable=true)
     */
    private $firstisolatedcg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastisolatedCG", type="date", nullable=true)
     */
    private $lastisolatedcg;

    /**
     * @var string
     *
     * @ORM\Column(name="geographicCG", type="string", length=200, nullable=true)
     */
    private $geographiccg;

    /**
     * @var string
     *
     * @ORM\Column(name="refstrain", type="text", length=255, nullable=true)
     */
    private $refstrain;

    /**
     * @var string
     *
     * @ORM\Column(name="REGArefstrain1", type="text", length=255, nullable=true)
     */
    private $regarefstrain1;

    /**
     * @var string
     *
     * @ORM\Column(name="REGArefstrain2", type="text", length=255, nullable=true)
     */
    private $regarefstrain2;

    /**
     * @var string
     *
     * @ORM\Column(name="REGArefstrain3", type="text", length=255, nullable=true)
     */
    private $regarefstrain3;

    /**
     * @var string
     *
     * @ORM\Column(name="Regav3resultCG", type="text", length=255, nullable=true)
     */
    private $regav3resultcg;

    /**
     * @var string
     *
     * @ORM\Column(name="Regav3result", type="text", length=255, nullable=true)
     */
    private $regav3result;

    /**
     * @var string
     *
     * @ORM\Column(name="phylotyperesults", type="text", nullable=true)
     */
    private $phylotyperesults;


}

