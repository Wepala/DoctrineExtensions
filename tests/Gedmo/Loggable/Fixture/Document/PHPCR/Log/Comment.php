<?php

namespace Loggable\Fixture\Document\PHPCR\Log;

use Gedmo\Loggable\Document\MappedSuperclass\AbstractLogEntry;
use Doctrine\ODM\PHPCR\Mapping\Annotations as ODM;

/**
 * @ODM\Document(
 *     repositoryClass="\Gedmo\Loggable\Document\PHPCR\Repository\LogEntryRepository"
 * )
 */
class Comment extends AbstractLogEntry
{
}
