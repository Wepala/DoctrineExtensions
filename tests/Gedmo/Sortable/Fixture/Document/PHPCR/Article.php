<?php

namespace Sortable\Fixture\Document\PHPCR;

use Doctrine\ODM\PHPCR\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document()
 */
class Article
{
    /** @ODM\Id */
    private $id;

    /**
     * @ODM\String
     */
    private $title;

    /**
     * @Gedmo\SortablePosition
     * @ODM\Long(nullable=true)
     */
    protected $position;

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

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }
}
