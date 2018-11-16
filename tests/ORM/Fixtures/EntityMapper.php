<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

namespace Spiral\ORM\Tests\Fixtures;

use Spiral\ORM\AbstractMapper;
use Spiral\ORM\ORMInterface;
use Zend\Hydrator\HydratorInterface;
use Zend\Hydrator\Reflection;

class EntityMapper extends AbstractMapper
{
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    public function __construct(ORMInterface $orm, $class)
    {
        parent::__construct($orm, $class);
        $this->hydrator = new Reflection();
    }

    public function hydrate($entity, array $data)
    {
        return $this->hydrator->hydrate($data, $entity);
    }

    public function extract($entity): array
    {
        return $this->hydrator->extract($entity);
    }
}