<?php

namespace dto;

require_once 'AbstractDto.php';
class UserDto extends AbstractDto
{

    public String $firstname;

    public String $lastname;

    public String $username;

    public array $role = array(RoleDto::class);

    /**
     * @return String
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return String
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return String
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param String $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getRole(): array
    {
        return $this->role;
    }

    /**
     * @param Array $role
     */
    public function setRole(array $role): void
    {
        $this->role = $role;
    }

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }

}