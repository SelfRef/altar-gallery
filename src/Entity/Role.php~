<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Role
 *
 * @ApiResource
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 */
class Role
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
     * @var array
     *
     * @ORM\Column(name="permissions", type="simple_array")
     */
    private $permissions;

    /**
     * @var bool
     *
     * @ORM\Column(name="isDefault", type="boolean", nullable=true, unique=true)
     */
    private $isDefault;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="role")
     */
    private $users;
}

