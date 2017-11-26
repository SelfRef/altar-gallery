<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ApiResource(
 *   collectionOperations={
 *     "get"={"method"="GET", "normalization_context"={"groups"={"post.get"}}},
 *     "post"={"method"="POST", "normalization_context"={"groups"={"post.post"}}}
 *   },
 *   itemOperations={
 *     "get"={"method"="GET", "normalization_context"={"groups"={"post.get"}}},
 *     "put"={"method"="PUT", "denormalization_context"={"groups"={"post.put"}}},
 *     "delete"={
 *       "method"="DELETE",
 *       "normalization_context"={"groups"={"post.delete"}}
 *     },
 *   }
 * )
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"post.get"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     * @Groups({"post.get", "post.post", "post.put"})
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Groups({"post.get", "post.post", "post.put"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     * @Groups({"post.get", "post.post", "post.put"})
     */
    private $source;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDate", type="datetime")
     * @Groups({"post.get"})
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishDate", type="datetime", nullable=true)
     * @Groups({"post.get"})
     */
    private $publishDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="isVisible", type="boolean")
     */
    private $isVisible;

    /**
     * @var array
     *
     * @ORM\Column(name="postValues", type="array", nullable=true)
     * @Groups({"post.get", "post.post"})
     */
    private $postValues;

    /**
     * @ORM\ManyToMany(targetEntity="Channel", mappedBy="posts")
     * @Groups({"post.get", "post.put"})
     */
    private $channels;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     * @ApiSubresource
     */
    private $comments;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @Groups({"post.get"})
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="PostType", inversedBy="posts")
     * @Groups({"post.get", "post.post"})
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="post")
     * @Groups({"post.get"})
     * @ApiSubresource
     */
    private $votes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->channels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createDate = new \DateTime();
        $this->publishDate = new \DateTime();
        $this->isVisible = true;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Post
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Post
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Post
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return Post
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get publishDate
     *
     * @return \DateTime
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Set isVisible
     *
     * @param boolean $isVisible
     *
     * @return Post
     */
    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * Get isVisible
     *
     * @return boolean
     */
    public function getIsVisible()
    {
        return $this->isVisible;
    }

    /**
     * Set postValues
     *
     * @param array $postValues
     *
     * @return Post
     */
    public function setPostValues($postValues)
    {
        $this->postValues = $postValues;

        return $this;
    }

    /**
     * Get postValues
     *
     * @return array
     */
    public function getPostValues()
    {
        return $this->postValues;
    }

    /**
     * Add channel
     *
     * @param Channel $channel
     *
     * @return Post
     */
    public function addChannel(Channel $channel)
    {
        $this->channels[] = $channel;

        return $this;
    }

    /**
     * Remove channel
     *
     * @param Channel $channel
     */
    public function removeChannel(Channel $channel)
    {
        $this->channels->removeElement($channel);
    }

    /**
     * Get channels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * Add comment
     *
     * @param Comment $comment
     *
     * @return Post
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param Comment $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set author
     *
     * @param User $author
     *
     * @return Post
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set type
     *
     * @param PostType $type
     *
     * @return Post
     */
    public function setType(PostType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return PostType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add vote
     *
     * @param Vote $vote
     *
     * @return Post
     */
    public function addVote(Vote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove vote
     *
     * @param Vote $vote
     */
    public function removeVote(Vote $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
