<?php

namespace dao;

use entity\UserEntity;
use Exception;
use helper\IdGenerator;
use mapper\UserMapper;
use PDO;

require_once '../../rest/mapper/UserMapper.php';
class UserDao{

    private UserMapper $userMapper;

    private IdGenerator $idGenerator;

    public function __construct(UserMapper $userMapper, IdGenerator $idGenerator) {
        $this->userMapper = $userMapper;
        $this->idGenerator = $idGenerator;
    }


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
     * @throws Exception
     */
    public function insertUser(UserEntity $user): ?UserEntity
    {
        global $db;

        $table = 'user';
        $column = 'id';
        $id = $this->idGenerator->generateUniqueId($db, $table, $column);

        try{

            $statement = $db -> prepare ('INSERT INTO user (id,firstname, lastname, username, password, role) 
            VALUES (:id, :firstname, :lastname, :username, :password, :role)');

            $db->beginTransaction();

            $statement -> execute ([':id'=>$id, ':firstname'=>$user->getFirstname(), ':lastname'=>$user->getLastname(), ':username'=>$user->getUsername(), ':password'=>$user->getPassword(), ':role'=>$user->getRole()]);


            $db->commit();

            $sql = 'SELECT * FROM user WHERE id = :id';
            $statement = $db->prepare($sql);

            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->userMapper->toEntity($result);
        }catch(Exception $e){
            echo $e->getMessage();
            $db->rollback();
            throw $e;
        }
    }

    public function updateUser(UserEntity $user){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE user SET
            firstname = :firstname,
            lastname = :lastname,
            username = :username,
            "password" = :"password",
            "role" = :"role"
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $user->getId());
            $statement->bindValue(':firstname', $user->getFirstname());
            $statement->bindValue(':lastname', $user->getLastname());
            $statement->bindValue(':username', $user->getUsername());
            $statement->bindValue(':password', $user->getPassword());
            $statement->bindValue(':role', $user->getRole());
            $statement->closeCursor();

            $db->commit();
            return $user;
        }catch(Exception $e){
            error_log('could not update user {}', $user->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteUser(int $id){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM user 
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete user {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>