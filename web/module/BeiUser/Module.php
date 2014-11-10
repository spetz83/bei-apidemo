<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/7/2014
 * Time: 1:35 PM
 */

namespace BeiUser;


use BeiUser\Controller\AdminController;
use Zend\Mvc\MvcEvent;
use BeiUser\Listener\BeiUserListener;

class Module 
{
    public function onBootstrap(MvcEvent $mvcEvent)
    {
        $em = $mvcEvent->getApplication()->getEventManager();
        $em->attach(new BeiUserListener());
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'BeiUser\Controller\Admin' => function($csm) {
                    $sm = $csm->getServiceLocator();
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $userRepo = $em->getRepository('BeiUser\Entity\User');

                    return new AdminController($em, $userRepo);
                },
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
} 