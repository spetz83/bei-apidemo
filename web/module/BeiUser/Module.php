<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/7/2014
 * Time: 1:35 PM
 */

namespace BeiUser;


class Module {
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