<?php

namespace dto;

require_once 'AbstractDto.php';
class RoleDto extends AbstractDto
{
    public String $name;

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}