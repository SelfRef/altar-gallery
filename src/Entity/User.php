<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
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
     * @var array
     *
     * @ORM\Column(name="roles", type="simple_array")
     */
    private $roles;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set passwordHash
     *
     * @param string $passwordHash
     *
     * @return User
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    /**
     * Get passwordHash
     *
     * @return string
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     *
     * @return User
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set lastSessionDate
     *
     * @param \DateTime $lastSessionDate
     *
     * @return User
     */
    public function setLastSessionDate($lastSessionDate)
    {
        $this->lastSessionDate = $lastSessionDate;

        return $this;
    }

    /**
     * Get lastSessionDate
     *
     * @return \DateTime
     */
    public function getLastSessionDate()
    {
        return $this->lastSessionDate;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set registerIp
     *
     * @param string $registerIp
     *
     * @return User
     */
    public function setRegisterIp($registerIp)
    {
        $this->registerIp = $registerIp;

        return $this;
    }

    /**
     * Get registerIp
     *
     * @return string
     */
    public function getRegisterIp()
    {
        return $this->registerIp;
    }

    /**
     * Set lastSessionIp
     *
     * @param string $lastSessionIp
     *
     * @return User
     */
    public function setLastSessionIp($lastSessionIp)
    {
        $this->lastSessionIp = $lastSessionIp;

        return $this;
    }

    /**
     * Get lastSessionIp
     *
     * @return string
     */
    public function getLastSessionIp()
    {
        return $this->lastSessionIp;
    }

    /**
     * Set siteSettings
     *
     * @param array $siteSettings
     *
     * @return User
     */
    public function setSiteSettings($siteSettings)
    {
        $this->siteSettings = $siteSettings;

        return $this;
    }

    /**
     * Get siteSettings
     *
     * @return array
     */
    public function getSiteSettings()
    {
        return $this->siteSettings;
    }

    /**
     * Set banExpirationDate
     *
     * @param \DateTime $banExpirationDate
     *
     * @return User
     */
    public function setBanExpirationDate($banExpirationDate)
    {
        $this->banExpirationDate = $banExpirationDate;

        return $this;
    }

    /**
     * Get banExpirationDate
     *
     * @return \DateTime
     */
    public function getBanExpirationDate()
    {
        return $this->banExpirationDate;
    }

    /**
     * Set socialData
     *
     * @param array $socialData
     *
     * @return User
     */
    public function setSocialData($socialData)
    {
        $this->socialData = $socialData;

        return $this;
    }

    /**
     * Get socialData
     *
     * @return array
     */
    public function getSocialData()
    {
        return $this->socialData;
    }
}

