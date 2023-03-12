<?php

namespace mapper;

use entity\RoleEntity;

class RoleMapper
{
    public function toEntity($row)
    {
        $role = new RoleEntity();
        $role->setId($row['id']);
        $role->setCreated($row['created']);
        $role->setLastModified($row['last_modified']);
        $role->setName($row['name']);

        return $role;
    }
}

?>