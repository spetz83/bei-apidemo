<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 11/9/2014
 * Time: 3:51 PM
 */

namespace BeiUser\Controller;

use BeiUser\Entity\UserRepository;
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

    public function __construct(EntityManager $em, UserRepository $userRepository)
    {
        $this->em = $em;
        $this->userRepo = $userRepository;
    }

    public function indexAction()
    {
        $users = $this->userRepo->findAll();
        $numUsers = count($users);
        return new ViewModel(array('numUsers'=>$numUsers));
    }

} 