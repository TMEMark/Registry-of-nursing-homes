<?php

namespace mapper;

use dto\UserDto;
use entity\UserEntity;

require_once '../../persistance/entity/UserEntity.php';
require_once '../dto/UserDto.php';
class UserMapper
{
    public function toEntity($row): UserEntity
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

    public function toDto(UserEntity $userEntity): UserDto
    {
        $user = new UserDto();
        $user->setId($userEntity->getId());
        $user->setFirstname($userEntity->getFirstname());
        $user->setLastname($userEntity->getLastname());
        $user->setUsername($userEntity->getUsername());
        $user->setRole($userEntity->getRole());

        return $user;
    }

    public static function fromStdClass($row): UserEntity
    {
        $user = new UserEntity();
        $user->setFirstname($row['firstname']);
        $user->setLastname($row['lastname']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);

        return $user;
    }

    public static function updateMapper($row): UserEntity
    {
        $user = new UserEntity();
        $user->setFirstname($row['id']);
        $user->setFirstname($row['firstname']);
        $user->setLastname($row['lastname']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);

        return $user;
    }
}

?>