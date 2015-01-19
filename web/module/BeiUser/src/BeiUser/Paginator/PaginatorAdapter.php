<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 11/25/2014
 * Time: 1:49 PM
 */

namespace BeiUser\Paginator;


use BeiUser\Entity\PaginatedEntityInterface;
use Zend\Paginator\Adapter\AdapterInterface;

class PaginatorAdapter implements AdapterInterface
{
    protected $repository;

    public function __construct(PaginatedEntityInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Returns collection of items for the given page
     *
     * @param int $offset
     * @param int $itemCountPerPage
     * @return array
     */
    public function getItems($offset, $itemCountPerPage)
    {
        return $this->repository->getItems($offset, $itemCountPerPage);
    }

    /**
     * Count of results
     *
     * @return int
     */
    public function count()
    {
        return $this->repository->count();
    }
} 