<?php

return array(
    'bjyauthorize' => array(
        'default_role'       => 'guest',
        'authenticated_role' => 'user',
        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                array(
                    'controller' => 'zfcuser',
                    'roles' => array('guest'),
                ),
                array(
                    'controller' => 'Application\Controller\Index',
                    'roles' => array('guest'),
                ),
            ),
        ),
    ),
);



