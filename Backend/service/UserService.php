<?php
include_once(__DIR__.'../../persistance/dao/UserDao.php');
include_once(__DIR__.'../../persistance/entity/UserEntity.php');
class UserService{
    private UserDao $userDao;

    public function __construct(UserDao $userDao) {
        $this->userDao = $userDao;
    }

    public function getUserById(int $id) {
        syslog(LOG_INFO, 'getting user');
        $userDao = $this->userDao->getUserById($id);
        if(empty($userDao)){
            syslog(LOG_INFO, 'no user found');
            throw new Exception('no user found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'user found');
            return $userDao;
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