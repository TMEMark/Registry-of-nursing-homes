<?php

namespace dto;

class CategoryDto extends AbstractDto
{
    private String $name;

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