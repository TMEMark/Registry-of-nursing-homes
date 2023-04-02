<?php

namespace mapper;

use dto\UserDto;
use entity\UserEntity;

class UserMapper
{
    public function toEntity($row)
    {
        $user = new UserEntity();
        $user->setId($row['id']);
        $user->setCreated($row['created']);
        $user->setLastModified($row['last_modified']);
        $user->setFirstname($row['firstname']);
        $user->setLastname($row['lastname']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);

        return $user;
    }

    public function toDto($row)
    {
        $user = new UserDto();
        $user->setId($row['id']);
        $user->setFirstname($row['firstname']);
        $user->setLastname($row['lastname']);
        $user->setUsername($row['username']);
        $user->setRole($row['role']);

        return $user;
    }
}

?>