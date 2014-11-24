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

    private $config;

    public function __construct(EntityManager $em, UserRepository $userRepository, UserForm $userForm, $config)
    {
        $this->em = $em;
        $this->userRepo = $userRepository;
        $this->userForm = $userForm;
        $this->config = $config;
        $this->userRepo->setHashCost($this->config['zfcuser']['password_cost']);
    }

    public function indexAction()
    {
        $users = $this->userRepo->findAll();
        $numUsers = count($users);
        return new ViewModel(array('numUsers' => $numUsers));
    }

    public function addAction()
    {
        $form = $this->userForm;

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid())
            {
                $this->userRepo->buildUser($form->getData());
                return $this->redirect()->toRoute('BeiUser\admin');
            }
        }

        return new ViewModel(array('form' => $form));
    }
}