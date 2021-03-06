<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/7/2014
 * Time: 1:39 PM
 */

return array(
    'controllers' => array(
        'factories' => array(
            'BeiUser\Controller\Admin' => 'BeiUser\Controller\Factories\AdminControllerFactory',
        ),
    ),
    'form_elements' =>array(
        'factories' => array(
            'BeiUser\Form\UserForm' => 'BeiUser\Form\Factories\UserFormFactory',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'BeiUser\Paginator\Paginator' => 'BeiUser\Paginator\PaginatorServiceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'BeiUser\admin' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/user/admin[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'BeiUser\Controller\Admin',
                        'action' => 'index',
                    ),
                ),
            ),
            'BeiUser\users' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/user/admin/list[/:action]/[page/:page]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'BeiUser\Controller\Admin',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
            'partials' => __DIR__ . '/../view/bei-user/partials'
        ),
    ),
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
                'object_manager'    => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'BeiUser\Entity\Role',
            ),
        ),
        'guards' => array(
            /*
             * This is where you can block whole controllers or specific actions based on role.
             */

            'BjyAuthorize\Guard\Controller' => array(
                array(
                    'controller' => 'BeiUser\Controller\Admin',
                    //'action' => array('index', 'add'),
                    'roles' => array('guest'),
                ),
            ),
        ),
    ),
);