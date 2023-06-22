<?php

namespace mapper;

use dto\RoleDto;
use entity\RoleEntity;

require_once '../../persistance/entity/RoleEntity.php';
require_once '../dto/RoleDto.php';
class RoleMapper
{

    public function toDto(RoleEntity $roleEntity): RoleDto
    {
        $role = new RoleDto();
        $role->setId($roleEntity->getId());
        $role->setName($roleEntity->getName());

        return $role;
    }
    
    public function toEntity($row)
    {
        $role = new RoleEntity();
        $role->setId($row['id']);
        $role->setCreated($row['created']);
        $role->setLastModified($row['last_modified']);
        $role->setName($row['name']);

        return $role;
    }

    public static function fromStdClass($row): RoleEntity
    {
        print_r($row);
        $role = new RoleEntity();
        $role->setName($row['name']);

        return $role;
    }

    public function updateMapper($row): RoleEntity
    {
        $role = new RoleEntity();
        $role->setId($row['id']);
        $role->setName($row['name']);

        return $role;
    }
}

?>