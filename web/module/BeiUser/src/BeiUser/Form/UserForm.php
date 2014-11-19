<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/18/2014
 * Time: 3:31 PM
 */

namespace BeiUser\Form;


use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class UserForm extends Form
{

    /**
     * @var EntityManager $em
     */
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;

        parent::__construct('user');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Username:',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email:'
            ),
        ));

        $this->add(array(
            'name' => 'displayName',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Display Name:'
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Password:'
            ),
        ));

        $this->add(array(
            'name' => 'password2',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Confirm Password:'
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'role',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'BeiUser\Entity\Role',
                'property' => 'roleId',
                'is_method' => false,
                'find_method' => array(
                    'name' => 'findAll'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Submit',
                'class' => 'btn btn-default'
            ),
        ));

    }
}