<?php

namespace Loggable\Fixture\Document\PHPCR;

use Doctrine\ODM\PHPCR\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document
 * @Gedmo\Loggable
 */
class Article
{
    /** @ODM\Id */
    private $id;

    /**
     * @Gedmo\Versioned
     * @ODM\String
     */
    private $title;

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
