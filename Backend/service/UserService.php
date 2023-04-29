<?php

namespace service;

use dao\RoleDao;
use dao\UserDao;
use entity\UserEntity;
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

    public function getUserById(int $id): \dto\UserDto
    {
        syslog(LOG_INFO, 'getting user');
        $userDao = $this->userMapper->toDto($this->userDao->getUserById($id));
        $roleDaoList = $this->roleDao->listRoles();
        $roleDTOList = [];
        foreach ($roleDaoList as $role) {
            $roleDTO = $this->roleMapper->toDto($role);
            $roleDTOList[] = $roleDTO;
        }
        if(empty($userDao && $roleDTOList)){
            syslog(LOG_INFO, 'no user found');
            throw new Exception('no user found with id {}');
        }else{
            syslog(LOG_INFO, 'user found');
            $rolesById = [];
            foreach ($roleDTOList as $role) {
                $rolesById[$role->id] = $role->name;
            }
            $userDao->roleName = $rolesById[$userDao->role];

            return $userDao;
        }
    }

    public function getUserByName(String $username): \dto\UserDto
    {
        syslog(LOG_INFO, 'getting user');
        $userDao = $this->userMapper->toDto($this->userDao->getUserByUsername($username));
        $roleDaoList = $this->roleDao->listRoles();
        $roleDTOList = [];
        foreach ($roleDaoList as $role) {
            $roleDTO = $this->roleMapper->toDto($role);
            $roleDTOList[] = $roleDTO;
        }
        if(empty($userDao && $roleDTOList)){
            syslog(LOG_INFO, 'no user found');
            throw new Exception('no user found with name {}');
        }else{
            syslog(LOG_INFO, 'user found');
            $rolesById = [];
            foreach ($roleDTOList as $role) {
                $rolesById[$role->id] = $role->name;
            }
            $userDao->roleName = $rolesById[$userDao->role];

            return $userDao;
        }
    }

    public function listUsers(): ?array
    {
        syslog(LOG_INFO, 'getting users');
        $userDaoList = $this->userDao->listUsers();
        $userDTOList = [];
        foreach ($userDaoList as $user) {
            $userDTO = $this->userMapper->toDto($user);
            $userDTOList[] = $userDTO;
        }
        $roleDaoList = $this->roleDao->listRoles();
        $roleDTOList = [];
        foreach ($roleDaoList as $role) {
            $roleDTO = $this->roleMapper->toDto($role);
            $roleDTOList[] = $roleDTO;
        }
        if(empty($userDTOList && $roleDTOList)){
            syslog(LOG_INFO, 'could not list users');
            throw new Exception('could not list users');
        }else{
            syslog(LOG_INFO, 'users found');
            $rolesById = [];
            foreach ($roleDTOList as $role) {
                $rolesById[$role->id] = $role->name;
            }
            foreach ($userDTOList as $user) {
                $user->roleName = $rolesById[$user->role];
            }
            return $userDTOList;
        }
    }

    public function insertUser(array $user): \dto\UserDto
    {
        syslog(LOG_INFO, 'creating user');
        $user = $this->userMapper->fromStdClass($user);
        $userDaoInsert = $this->userMapper->toDto($this->userDao->insertUser($user));
        if($userDaoInsert == null){
            syslog(LOG_INFO, 'could not create user');
            throw new Exception('could not create user');
        }else{
            syslog(LOG_INFO, 'user created');
            return $userDaoInsert;
        }
    }

    public function updateUser(UserEntity $user): \dto\UserDto
    {
        syslog(LOG_INFO, 'updating user');
        $user = $this->userMapper->updateMapper($user);

        $userId = $user->getId();
        $userDaoGetById = $this->userDao->getUserById($userId);
        syslog(LOG_INFO, 'getting user');
        if(empty($userDaoGetById)){
            syslog(LOG_INFO, 'user not found');
            throw new Exception('no user found with id {}', $userId);
        }else{
            $userDao = $this->userMapper->toDto($this->userDao->updateUser($user));
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