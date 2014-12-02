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
        $serviceManager = $serviceLocator->getServiceLocator();
        $entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
        $userRepo = $entityManager->getRepository('BeiUser\Entity\User');
        $userForm = $serviceManager->get('FormElementManager')->get('BeiUser\Form\UserForm');
        $config = $serviceManager->get('Config');
        $paginator = $serviceManager->get('BeiUser\Paginator\Paginator');
        return new AdminController($entityManager, $userRepo, $userForm, $config, $paginator);
    }
} 