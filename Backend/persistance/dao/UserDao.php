<?php
include("UserMapper.php");
class UserDao{

    private final UserMapper $userMapper;

    public function __construct(UserMapper $userMapper) {
        $this->userMapper = $userMapper;
    }


    public function getUserById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM user WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->userMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find user {}', $id, $e);
			return null;
        }
    }

    public function getUserByUsername(String $username){
        global $db;
        $sql = 'SELECT * FROM user WHERE username = :username';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':username', $username);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->userMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find user {}', $username, $e);
			return null;
        }
    }

    public function listUsers(){
        global $db;
        $sql = 'SELECT * FROM user';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->userMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find user', $e);
			return null;
        }
    }

    public function insertUser(UserEntity $user){
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $db->beginTransaction();
            $db -> query = 
            'INSERT INTO user (id,firstname, lastname, username, "password", "role") 
            VALUES (:id,:firstname, :lastname, :username, :"password", :"role")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':firstname', $user->getFirstname());
            $statement->bindValue(':lastname', $user->getLastname());
            $statement->bindValue(':username', $user->getUsername());
            $statement->bindValue(':password', $user->getPassword());
            $statement->bindValue(':role', $user->getRole());
            $statement->closeCursor();

            $db->commit();
            return $user;
        }catch(Exception $e){
            error_log('could not create user {}', $user->getId(), $e);
            $db->rollback();
			return null;
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
            'DELETE FROM administratori 
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