<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BServer
 * @ORM\Entity(repositoryClass="App\Repository\ServerRepository")
 * @ORM\Table(name="b_server")
 */
class BServer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="svr_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $svrId;

    /**
     * @var string
     *
     * @ORM\Column(name="svr_name", type="string", length=25, nullable=false)
     */
    private $svrName;

    /**
     * @var string
     *
     * @ORM\Column(name="svr_addr", type="string", length=50, nullable=false)
     */
    private $svrAddr;

    /**
     * @var string
     *
     * @ORM\Column(name="svr_ip", type="string", length=15, nullable=false)
     */
    private $svrIp;

    /**
     * @var string
     *
     * @ORM\Column(name="instns_to_access", type="string", length=200, nullable=true)
     */
    private $instnsToAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="instns_to_req_acc", type="string", length=200, nullable=true)
     */
    private $instnsToReqAcc;


    public function getSvrId(): int
    {
        return $this->svrId;
    }


    public function getSvrName(): ?string
    {
        return $this->svrName;
    }


    public function setSvrName(string $svrName)
    {
        $this->svrName = $svrName;
    }


    public function getSvrAddr(): ?string
    {
        return $this->svrAddr;
    }


    public function setSvrAddr(string $svrAddr)
    {
        $this->svrAddr = $svrAddr;
    }


    public function getSvrIp(): ?string
    {
        return $this->svrIp;
    }


    public function setSvrIp(string $svrIp)
    {
        $this->svrIp = $svrIp;
    }


    public function getInstnsToAccess(): ?string
    {
        return $this->instnsToAccess;
    }


    public function setInstnsToAccess(string $instnsToAccess)
    {
        $this->instnsToAccess = $instnsToAccess;
    }


    public function getInstnsToReqAcc(): ?string
    {
        return $this->instnsToReqAcc;
    }


    public function setInstnsToReqAcc(string $instnsToReqAcc)
    {
        $this->instnsToReqAcc = $instnsToReqAcc;
    }


}

