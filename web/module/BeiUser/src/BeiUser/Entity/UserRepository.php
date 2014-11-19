<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 11/10/2014
 * Time: 3:28 PM
 */

namespace BeiUser\Entity;


use Doctrine\ORM\EntityRepository;
use Zend\Crypt\Password\Bcrypt;

class UserRepository extends EntityRepository
{
    protected $passwordHashCost;

    public function buildUser($data)
    {
        $user = new User();
        //$user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setDisplayName($data['displayName']);
        $user->setPassword($this->createPassword($data['password']));
        $roleRepo = $this->getEntityManager()->getRepository('BeiUser\Entity\Role');
        $role = $roleRepo->findOneBy(array('id'=>$data['role']));
        $user->addRole($role);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    private function createPassword($ptPassword)
    {
        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->passwordHashCost);
        return $bcrypt->create($ptPassword);
    }

    public function setHashCost($cost)
    {
        $this->passwordHashCost = $cost;
    }
} 