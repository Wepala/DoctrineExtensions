<?php

namespace Mapping\Fixture\Document\PHPCR;

use Gedmo\Mapping\Mock\Extension\Encoder\Mapping as Ext;
use Doctrine\ODM\PHPCR\Mapping\Annotations as ODM;

/**
 * @ODM\Document()
 */
class User
{
    /**
     * @ODM\Id
     */
    private $id;

    /**
     * @Ext\Encode(type="sha1", secret="xxx")
     * @ODM\String()
     */
    private $name;

    /**
     * @Ext\Encode(type="md5")
     * @ODM\String()
     */
    private $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
