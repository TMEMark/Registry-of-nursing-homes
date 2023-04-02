<?php

namespace dao;

use entity\RoleEntity;
use Exception;
use mapper\RoleMapper;
use PDO;

require_once '../../rest/mapper/RoleMapper.php';
class RoleDao{

    private RoleMapper $roleMapper;

    public function __construct(RoleMapper $roleMapper) {
        $this->roleMapper = $roleMapper;
    }

    public function getRoleById(int $id): ?RoleEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM role WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->roleMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find role {}', $id, $e);
			return null;
        }
    }

    public function getRoleByName(String $name): ?RoleEntity
    {
        global $db;
        $sql = 'SELECT * FROM role WHERE name = :name';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->roleMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find role {}', $name, $e);
			return null;
        }
    }

    public function listRoles(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM role';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->roleMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find role', $e);
			return null;
        }
    }

    public function insertRole(RoleEntity $role): ?RoleEntity
    {
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $statement = $db -> prepare ('INSERT INTO role (id,name) 
            VALUES (:id,:name)');

            $db->beginTransaction();

            $statement -> execute ([':id'=>$id, ':name'=>$role->getName()]);

            $db->commit();

            $sql = 'SELECT * FROM role WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->roleMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not create role {}', $role->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateRole(RoleEntity $role): ?RoleEntity
    {
        global $db;
        try{
            $statement = $db -> prepare ('UPDATE role SET
            name = :name
            WHERE id = :id');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$role->getId(), ':name'=>$role->getName()]);

            $db->commit();
            return $role;
        }catch(Exception $e){
            error_log('could not update role {}', $role->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteRole(int $id): bool
    {
        global $db;
        try{
            $statement = $db -> prepare ('DELETE FROM role
            WHERE id = :id ');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$id]);

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