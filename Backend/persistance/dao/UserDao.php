<?php

namespace dao;

use entity\UserEntity;
use Exception;
use mapper\UserMapper;
use PDO;

require_once '../../rest/mapper/UserMapper.php';
class UserDao{

    private UserMapper $userMapper;

    public function __construct(UserMapper $userMapper) {
        $this->userMapper = $userMapper;
    }

    /**
     * Function getUserById gets user by id attribute in db
     * @param int $id - $id parameter to get user by
     * @return UserEntity if user is found in db | null if it is not found
     */
    public function getUserById(int $id): ?UserEntity
    {
        global $db;
        $sql = 'SELECT * FROM user WHERE id = :id';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->userMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find user {}', $id, $e);
			return null;
        }
    }

    /**
     * Function getUserByUsername gets user by username attribute in db
     * @param String $username - $username parameter to get user by
     * @return UserEntity if user is found in db | null if it is not found
     */
    public function getUserByUsername(String $username): ?UserEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM user WHERE username = :username';
            $statement = $db->prepare($sql);
            $statement->bindValue(':username', $username);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->userMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find user {}', $username, $e);
			return null;
        }
    }

    /**
     * Function listUsers gets all users in db
     * @return array if users are found | null if they were not found
     */
    public function listUsers(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM user';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->userMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find user', $e);
			return null;
        }
    }

    /**
     * Function insertUser inserts data into user table in database
     * @param UserEntity $user - data to be inserted
     * @return UserEntity if user is inserted successfully | null if it is not
     */
    public function insertUser(UserEntity $user): ?UserEntity
    {
        global $db;
        try{

            $statement = $db -> prepare ('INSERT INTO user (firstname, lastname, username, password, role) 
            VALUES (:firstname, :lastname, :username, :password, :role)');

            $db->beginTransaction();

            $statement -> execute ([':firstname'=>$user->getFirstname(), ':lastname'=>$user->getLastname(), ':username'=>$user->getUsername(), ':password'=>$user->getPassword(), ':role'=>$user->getRole()]);


            $db->commit();

            $userId = $db->lastInsertId();
            $user->setId($userId);

            return $user;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not insert user', $user->getId(), $e);
            return null;
        }
    }

    /**
     * Function updateUser updates data in user table in database by id
     * @param UserEntity $user - data to be updated
     * @return UserEntity if user is updated successfully | null if it is not
     */
    public function updateUser(UserEntity $user): ?UserEntity
    {
        global $db;
        try{
            $statement = $db -> prepare('UPDATE user SET
            firstname = :firstname,
            lastname = :lastname,
            username = :username,
            password = :password,
            role = :role
            WHERE id = :id');

            $db->beginTransaction();

            $statement -> execute ([':id'=>$user->getId(),':firstname'=>$user->getFirstname(), ':lastname'=>$user->getLastname(), ':username'=>$user->getUsername(), ':password'=>$user->getPassword(), ':role'=>$user->getRole()]);

            $db->commit();
            return $user;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not update user {}', $user->getId(), $e);
			return null;
        }
    }

    /**
     * Function deleteUser delete data in user table in database by id
     * @param int $id - $id by which user entry is deleted in db
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        global $db;
        try{

            $statement = $db -> prepare ('DELETE FROM user
            WHERE id = :id ');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$id]);

            $db->commit();
            return true;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not delete user {}', $id, $e);
            return false;
        }
    }
}
?>