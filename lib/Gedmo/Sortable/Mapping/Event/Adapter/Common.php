<?php

namespace Gedmo\Sortable\Mapping\Event\Adapter;

use Doctrine\ODM\PHPCR\Query\NoResultException;
use Gedmo\Mapping\Event\Adapter\Common as BaseAdapterCommon;
use Gedmo\Sortable\Mapping\Event\SortableAdapter;

/**
 * Doctrine event adapter for ODM adapted
 * for sortable behavior
 *
 * @author Lukas Botsch <lukas.botsch@gmail.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
final class Common extends BaseAdapterCommon implements SortableAdapter
{
    public function getMaxPosition(array $config, $meta, $groups)
    {
        $dm = $this->getObjectManager();
        $alias = 'u';
        $qb = $dm->createQueryBuilder();
        $qb->from()->document($config['useObjectClass'],$alias);
        foreach ($groups as $group => $value) {
            $qb->field($alias.'.'.$group)->equals($value);
        }
        $qb->orderBy()->desc()->field($alias.'.'.$config['position']);
        try {
            $document = $qb->getQuery()->getSingleResult();
        } catch (NoResultException $e) {
            return -1;
        }

        if ($document) {
            return $meta->getReflectionProperty($config['position'])->getValue($document);
        }

        return -1;
    }

    public function updatePositions($relocation, $delta, $config)
    {
        $dm = $this->getObjectManager();

        $delta = array_map('intval', $delta);

        $qb = $dm->createQueryBuilder($config['useObjectClass']);
        $qb->update();
        $qb->multiple(true);
        $qb->field($config['position'])->inc($delta['delta']);
        $qb->field($config['position'])->gte($delta['start']);
        if ($delta['stop'] > 0) {
            $qb->field($config['position'])->lt($delta['stop']);
        }
        foreach ($relocation['groups'] as $group => $value) {
            $qb->field($group)->equals($value);
        }

        $qb->getQuery()->execute();
    }
}
