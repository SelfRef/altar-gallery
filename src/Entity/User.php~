<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * User
 *
 * @ApiResource
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordHash", type="string", length=255, nullable=true)
     */
    private $passwordHash;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerDate", type="datetime")
     */
    private $registerDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastSessionDate", type="datetime")
     */
    private $lastSessionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="registerIp", type="string", length=255, nullable=true)
     */
    private $registerIp;

    /**
     * @var string
     *
     * @ORM\Column(name="lastSessionIp", type="string", length=255, nullable=true)
     */
    private $lastSessionIp;

    /**
     * @var array
     *
     * @ORM\Column(name="siteSettings", type="array", nullable=true)
     */
    private $siteSettings;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="banExpirationDate", type="datetime", nullable=true)
     */
    private $banExpirationDate;

    /**
     * @var array
     *
     * @ORM\Column(name="socialData", type="array", nullable=true)
     */
    private $socialData;

    /**
     * @ORM\ManyToMany(targetEntity="Post", inversedBy="author")
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="author")
     */
    private $votes;
}

