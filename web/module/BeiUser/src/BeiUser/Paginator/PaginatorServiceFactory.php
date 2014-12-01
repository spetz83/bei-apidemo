<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12/1/2014
 * Time: 4:22 PM
 */

namespace BeiUser\Paginator;


use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PaginatorServiceFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $services, $name, $requestedName)
    {
        if($requestedName === 'PaginatorAdapter')
        {
            return true;
        }
        return false;
    }

    public function createServiceWithName(ServiceLocatorInterface $services, $name, $requestedName)
    {
        $paginator = new PaginatorAdapter();
        return $paginator;
    }
} 