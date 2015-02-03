<?php

namespace Gedmo\Loggable\Document\PHPCR\MappedSuperclass;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;

/**
 * Gedmo\Loggable\Document\MappedSuperclass\AbstractLogEntry
 *
 * @PHPCRODM\Document(translator="attribute",versionable="simple")
 */
abstract class AbstractLogEntry
{
    /**
     * @var integer $id
     *
     * @PHPCRODM\Id
     */
    protected $id;
    /**
     * The language this document currently is in
     * @PHPCRODM\Locale
     */
    private $locale;

    /**
     * @var string $action
     *
     * @PHPCRODM\String
     */
    protected $action;

    /**
     * @var \DateTime $loggedAt
     *
     * @PHPCRODM\Date
     */
    protected $loggedAt;

    /**
     * @var string $objectId
     *
     * @PHPCRODM\String(nullable=true)
     */
    protected $objectId;

    /**
     * @var string $objectClass
     *
     * @PHPCRODM\String
     */
    protected $objectClass;

    /**
     * @var integer $version
     *
     * @PHPCRODM\Int
     */
    protected $version;

    /**
     * @PHPCRODM\VersionName
     */
    private $versionName;

    /**
     * @PHPCRODM\VersionCreated
     */
    private $versionCreated;

    /**
     * @var string $data
     *
     * @PHPCRODM\String(nullable=true)
     */
    protected $data;

    /**
     * @var string $data
     *
     * @PHPCRODM\String(nullable=true)
     */
    protected $username;

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
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set action
     *
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Get object class
     *
     * @return string
     */
    public function getObjectClass()
    {
        return $this->objectClass;
    }

    /**
     * Set object class
     *
     * @param string $objectClass
     */
    public function setObjectClass($objectClass)
    {
        $this->objectClass = $objectClass;
    }

    /**
     * Get object id
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set object id
     *
     * @param string $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get loggedAt
     *
     * @return \DateTime
     */
    public function getLoggedAt()
    {
        return $this->loggedAt;
    }

    /**
     * Set loggedAt to "now"
     */
    public function setLoggedAt()
    {
        $this->loggedAt = new \DateTime();
    }

    /**
     * Get data
     *
     * @return array or null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set data
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Set current version
     *
     * @param integer $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get current version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getVersionName()
    {
        return $this->versionName;
    }

    /**
     * @param mixed $versionName
     */
    public function setVersionName($versionName)
    {
        $this->versionName = $versionName;
    }

    /**
     * @return mixed
     */
    public function getVersionCreated()
    {
        return $this->versionCreated;
    }

    /**
     * @param mixed $versionCreated
     */
    public function setVersionCreated($versionCreated)
    {
        $this->versionCreated = $versionCreated;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }


}
