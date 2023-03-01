<?php
include('../mapper/RoleMapper.php');
include("../entity/RoleEntity.php");
class RoleDao{

    private RoleMapper $roleMapper;

    public function __construct(RoleMapper $roleMapper) {
        $this->roleMapper = $roleMapper;
    }

    public function getRoleById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM "role" WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->roleMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find role {}', $id, $e);
			return null;
        }
    }

    public function getRoleByName(String $name){
        global $db;
        $sql = 'SELECT * FROM role WHERE name = :"name"';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->roleMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find role {}', $name, $e);
			return null;
        }
    }

    public function listRoles(){
        global $db;
        $sql = 'SELECT * FROM role';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->roleMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find role', $e);
			return null;
        }
    }

    public function insertRole(RoleEntity $role){
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $db->beginTransaction();
            $db -> query = 
            'INSERT INTO role (id,"name") 
            VALUES (:id,:"name")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':name', $role->getName());
            $statement->closeCursor();

            $db->commit();
            return $role;
        }catch(Exception $e){
            error_log('could not create role {}', $role->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateRole(RoleEntity $role){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE role SET
            "name" = :"name",
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $role->getId());
            $statement->bindValue(':"name"', $role->getName());
            $statement->closeCursor();

            $db->commit();
            return $role;
        }catch(Exception $e){
            error_log('could not update role {}', $role->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteRole(int $id){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM role
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete role {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>