<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/12/2014
 * Time: 1:41 PM
 */

namespace Application\Service\Factories;


use Application\Service\SettingsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SettingsServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();

        return new SettingsService($sm);
    }
} 