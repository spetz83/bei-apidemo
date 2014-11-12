<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/12/2014
 * Time: 1:41 PM
 */

namespace BeiUser\Controller\Factories;


use BeiUser\Controller\AdminController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $em = $sm->get('Doctrine\ORM\EntityManager');
        $userRepo = $em->getRepository('BeiUser\Entity\User');

        return new AdminController($em, $userRepo);
    }
} 