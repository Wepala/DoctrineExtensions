<?php

namespace Gedmo\Loggable\Document\PHPCR;

use Doctrine\ODM\PHPCR\Mapping\Annotations\Document;

/**
 * Gedmo\Loggable\Document\PHPCR\LogEntry
 *
 * @Document(repositoryClass="\Gedmo\Loggable\Document\PHPCR\Repository\LogEntryRepository")
 */
class LogEntry extends MappedSuperclass\AbstractLogEntry
{
    /**
     * All required columns are mapped through inherited superclass
     */
}
