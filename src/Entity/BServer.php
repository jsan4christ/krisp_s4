<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BServer
 *
 * @ORM\Table(name="b_server")
 * @ORM\Entity
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
     * @ORM\Column(name="instns_to_access", type="string", length=200, nullable=false)
     */
    private $instnsToAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="instns_to_req_acc", type="string", length=200, nullable=false)
     */
    private $instnsToReqAcc;


}

