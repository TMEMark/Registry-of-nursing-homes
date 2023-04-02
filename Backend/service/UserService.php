<?php

namespace service;

use dao\RoleDao;
use dao\UserDao;
use Exception;
use mapper\RoleMapper;
use mapper\UserMapper;

class UserService{
    private UserDao $userDao;

    private RoleDao $roleDao;
    private UserMapper $userMapper;

    private RoleMapper $roleMapper;

    public function __construct(UserDao $userDao, RoleDao $roleDao, UserMapper $userMapper, RoleMapper $roleMapper) {
        $this->userDao = $userDao;

        $this->roleDao = $roleDao;

        $this->userMapper = $userMapper;

        $this->roleMapper = $roleMapper;
    }

    public function getUserById(int $id): array
    {
        syslog(LOG_INFO, 'getting user');
        $results = array();

        $users = $this->userMapper->toDto($this->userDao->getUserById($id));
        $roles = $this->roleMapper->toDto($this->roleDao->getRoleById($id));
        if(empty($userDao)){
            syslog(LOG_INFO, 'no user found');
            throw new Exception('no user found with id {}', $id);
        }else{
            foreach ($users as $user) {
                $roleId = $user->getRole();
                foreach ($roles as $role) {
                    if ($role->getId() === $roleId) {
                        $user->setRole($role);
                        break;
                    }
                }
                $results[] = $user;
            }

            return $results;
        }
    }

    public function getUserByName(String $username){
        syslog(LOG_INFO, 'getting user');
        $userDao = $this->userDao->getUserByUsername($username);
        if(empty($userDao)){
            syslog(LOG_INFO, 'no user found');
            throw new Exception('no user found with name {}', $username);
        }else{
            syslog(LOG_INFO, 'user found');
            return $userDao;
        }
    }

    public function listUsers(){
        syslog(LOG_INFO, 'getting users');
       $userDaoList = $this->userDao->listUsers();
       if(empty($userDaoList)){
        syslog(LOG_INFO, 'could not list users');
        throw new Exception('could not list users');
       }else{
        syslog(LOG_INFO, 'users found');
        return $userDaoList;
       }
    }

    public function insertUser(UserEntity $user){
        syslog(LOG_INFO, 'creating user');
        $userDaoInsert = $this->userDao->insertUser($user);
        if($userDaoInsert == null){
            syslog(LOG_INFO, 'could not create user');
            throw new Exception('could not create user');
        }else{
            syslog(LOG_INFO, 'user created');
            return $userDaoInsert;
        }
    }

    public function updateUser(UserEntity $user){
        syslog(LOG_INFO, 'updating user');
        $userId = $user->getId();
        $userDaoGetById = $this->userDao->getUserById($userId);
        syslog(LOG_INFO, 'getting user');
        if(empty($userDaoGetById)){
            syslog(LOG_INFO, 'user not found');
            throw new Exception('no user found with id {}', $userId);
        }else{
            $userDao = $this->userDao->updateUser($user);
            if($userDao == null){
                syslog(LOG_INFO, 'could not update user');
                throw new Exception('could not update user');
            }else{
                syslog(LOG_INFO, 'user updated successfully');
                return $userDao;
            }
        }
    }

    public function deleteUser(int $id){
        syslog(LOG_INFO, 'deleting user');
        $userDaoDeleted = $this->userDao->deleteUser($id);
        if($userDaoDeleted == false){
            syslog(LOG_ERR, 'could not delete user');
            throw new Exception('could not delete user');
        }else{
            syslog(LOG_INFO, 'user deleted');
        }
    }
}

?>