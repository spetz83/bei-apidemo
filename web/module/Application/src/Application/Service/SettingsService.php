<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/18/2014
 * Time: 2:52 PM
 */

namespace Application\Service;


use Zend\ServiceManager\ServiceLocatorInterface;

class SettingsService
{
    private $sm;

    public function __construct(ServiceLocatorInterface $sm)
    {
        $this->sm = $sm;
    }


    public function getConfigByName($name)
    {
        $config = $this->sm->get('Config');
    }
}
