<?php

namespace dto;

require_once 'AbstractDto.php';
class LocationDto extends AbstractDto
{
    public String $name;

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function jsonSerialize(): object
    {
        return (object) get_object_vars($this);
    }
}