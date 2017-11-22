<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Channel
 *
 * @ApiResource
 * @ORM\Table(name="channel")
 * @ORM\Entity(repositoryClass="App\Repository\ChannelRepository")
 */
class Channel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="isDynamic", type="boolean")
     */
    private $isDynamic;

    /**
     * @var array
     *
     * @ORM\Column(name="requirements", type="array", nullable=true)
     */
    private $requirements;

    /**
     * @ORM\ManyToMany(targetEntity="Post", inversedBy="channels")
     */
    private $posts;
}

