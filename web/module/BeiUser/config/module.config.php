<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/7/2014
 * Time: 1:39 PM
 */

return array(
    'doctrine' => array(
        'driver' => array(
            'zfcuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../src/BeiUser/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'BeiUser\Entity' => 'zfcuser_entity',
                ),
            ),
        ),
    ),
    'zfcuser' => array(
        'user_entity_class'       => 'BeiUser\Entity\User',
        'enable_default_entities' => false,
    ),
    'bjyauthorize' => array(
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        'role_providers' => array(
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entity_manager.orm_default',
                'role_entity_class' => 'BeiUser\Entity\Role',
            ),
        ),
    ),
);