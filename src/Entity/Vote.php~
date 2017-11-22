<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Vote
 *
 * @ApiResource
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="App\Repository\VoteRepository")
 */
class Vote
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
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="votes")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="votes")
     */
    private $post;
}

