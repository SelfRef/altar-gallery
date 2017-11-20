<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * PostType
 *
 * @ApiResource
 * @ORM\Table(name="post_type")
 * @ORM\Entity(repositoryClass="App\Repository\PostTypeRepository")
 */
class PostType
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
     * @var string
     *
     * @ORM\Column(name="controller", type="string", length=255, nullable=true)
     */
    private $controller;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="type")
     */
    private $posts;
}

