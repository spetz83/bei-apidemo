<?php
namespace BeiUser\Listener;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\Event;

class BeiUserListener extends AbstractListenerAggregate
{
    const  ROLE_USER = 'user';

    public function attach(EventManagerInterface $events)
    {
        $sharedManager = $events->getSharedManager();
        $this->listeners[] = $sharedManager->attach('ZfcUser\Service\User', 'register', array($this, 'onRegister'));
        $this->listeners[] = $sharedManager->attach('ZfcUser\Service\User', 'register.post', array($this, 'onRegisterPost'));
    }
    
    public function onRegister(Event $e)
    {
        $sm = $e->getTarget()->getServiceManager();
        $em = $sm->get('doctrine.entitymanager.orm_default');
        $user = $e->getParam('user');
        $role = $em->getRepository('BeiUser\Entity\Role')->findOneBy(array('roleId' => self::ROLE_USER));
        
        if($role)
        {
            $user->addRole($role);
        }
    }
    
    public function onRegisterPost(Event $e)
    {
        //TODO: Do things after the user has been registered
    }
}

?>