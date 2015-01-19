<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12/1/2014
 * Time: 4:22 PM
 */

namespace BeiUser\Paginator;


use Zend\Paginator\Paginator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PaginatorServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $userRepo = $entityManager->getRepository('BeiUser\Entity\User');
        $adapter = new PaginatorAdapter($userRepo);
        $page = $serviceLocator->get('application')->getMvcEvent()->getRouteMatch()->getParam('page');
        $paginator = new Paginator($adapter);
        $paginator->setCurrentPageNumber($page)
            ->setItemCountPerPage(5);
        return $paginator;
    }
} 