<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BGrants
 *
 * @ORM\Table(name="b_grants")
 * @ORM\Entity
 */
class BGrants
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
     * @ORM\Column(name="short_title", type="string", length=100, nullable=true)
     */
    private $shortTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=300, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="PIs", type="string", length=200, nullable=true)
     */
    private $pis;

    /**
     * @var string
     *
     * @ORM\Column(name="result", type="string", nullable=true)
     */
    private $result;

    /**
     * @var string
     *
     * @ORM\Column(name="award_letter", type="string", length=200, nullable=true)
     */
    private $awardLetter;

    /**
     * @var string
     *
     * @ORM\Column(name="contract", type="string", length=200, nullable=true)
     */
    private $contract;

    /**
     * @var string
     *
     * @ORM\Column(name="scientifc_proposal", type="string", length=200, nullable=true)
     */
    private $scientifcProposal;

    /**
     * @var string
     *
     * @ORM\Column(name="proposal_type", type="string", nullable=true)
     */
    private $proposalType;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="string", length=200, nullable=true)
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="budget_justification", type="string", length=200, nullable=true)
     */
    private $budgetJustification;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text", nullable=true)
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="collaborators", type="text", nullable=true)
     */
    private $collaborators;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_primary", type="string", nullable=true)
     */
    private $topicPrimary;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_secondary", type="string", nullable=true)
     */
    private $topicSecondary;

    /**
     * @var string
     *
     * @ORM\Column(name="costcentre", type="string", length=10, nullable=true)
     */
    private $costcentre;

    /**
     * @var string
     *
     * @ORM\Column(name="organism", type="string", nullable=true)
     */
    private $organism;

    /**
     * @var string
     *
     * @ORM\Column(name="funder", type="string", length=200, nullable=true)
     */
    private $funder = '';

    /**
     * @var string
     *
     * @ORM\Column(name="call_doc", type="string", length=200, nullable=true)
     */
    private $callDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="call_website", type="string", length=200, nullable=true)
     */
    private $callWebsite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;


}

