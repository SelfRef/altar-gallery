<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
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
     * @ORM\Column(name="email", type="string", length=255, nullable=true, unique=true)
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
     * @ORM\Column(name="passwordHash", type="text", nullable=true)
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
     * @var \stdClass
     *
     * @ORM\Column(name="accountSettings", type="object", nullable=true)
     */
    private $accountSettings;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="banExpirationDate", type="datetime", nullable=true)
     */
    private $banExpirationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=255, nullable=true)
     */
    private $facebookId;

    /**
     * @var int
     *
     * @ORM\Column(name="roleId", type="integer", nullable=true)
     */
    private $roleId;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="customPermissions", type="object", nullable=true)
     */
    private $customPermissions;


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
     * Set accountSettings
     *
     * @param \stdClass $accountSettings
     *
     * @return User
     */
    public function setAccountSettings($accountSettings)
    {
        $this->accountSettings = $accountSettings;

        return $this;
    }

    /**
     * Get accountSettings
     *
     * @return \stdClass
     */
    public function getAccountSettings()
    {
        return $this->accountSettings;
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
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set roleId
     *
     * @param integer $roleId
     *
     * @return User
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Get roleId
     *
     * @return int
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set customPermissions
     *
     * @param \stdClass $customPermissions
     *
     * @return User
     */
    public function setCustomPermissions($customPermissions)
    {
        $this->customPermissions = $customPermissions;

        return $this;
    }

    /**
     * Get customPermissions
     *
     * @return \stdClass
     */
    public function getCustomPermissions()
    {
        return $this->customPermissions;
    }
}

