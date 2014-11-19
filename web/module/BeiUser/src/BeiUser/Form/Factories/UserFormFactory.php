<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/18/2014
 * Time: 3:58 PM
 */

namespace BeiUser\Form\Factories;


use BeiUser\Form\UserForm;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class UserFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $em = $sm->get('Doctrine\ORM\EntityManager');
        $form = new UserForm($em);

        return $form;
    }
} 