<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 11/25/2014
 * Time: 1:59 PM
 */

namespace BeiUser\Entity;

interface PaginatedEntityInterface
{
    /**
     * @return int
     */
    public function count();

    /**
     * @param int $offset
     * @param int $itemCountPerPage
     * @return array
     */
    public function getItems($offset, $itemCountPerPage);
} 