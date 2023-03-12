<?php

namespace mapper;
use dto\CategoryDto;
use entity\CategoryEntity;

require_once '../../persistance/entity/CategoryEntity.php';

class CategoryMapper
{

    public function toDto($array): CategoryDto
    {
        $category = new CategoryDto();
        $category->setId($array['id']);
        $category->setName($array['name']);

        return $category;
    }

    public function toEntity($row)
    {
        $category = new CategoryEntity();
        $category->setId($row['id']);
        $category->setCreated($row['created']);
        $category->setLastModified($row['last_modified']);
        $category->setName($row['name']);

        return $category;
    }
}

?>