<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 11/9/2014
 * Time: 3:51 PM
 */

namespace BeiUser\Controller;

use BeiUser\Entity\UserRepository;
use BeiUser\Form\UserForm;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * @var UserRepository $userRepo
     */
    private $userRepo;

    /**
     * @var UserForm $userForm
     */
    private $userForm;

    public function __construct(EntityManager $em, UserRepository $userRepository, UserForm $userForm)
    {
        $this->em = $em;
        $this->userRepo = $userRepository;
        $this->userForm = $userForm;
    }

    public function indexAction()
    {
        $users = $this->userRepo->findAll();
        $numUsers = count($users);
        return new ViewModel(array('numUsers'=>$numUsers));
    }

    public function addAction()
    {
        $form = $this->userForm;

        return new ViewModel(array('form'=> $form));
    }

} 