<?php

namespace mapper;
use dto\CategoryDto;
use entity\CategoryEntity;

require_once '../../persistance/entity/CategoryEntity.php';
require_once '../dto/CategoryDto.php';

class CategoryMapper
{

    public function toDto(CategoryEntity $categoryEntity): CategoryDto
    {
        $category = new CategoryDto();
        $category->setId($categoryEntity->getId());
        $category->setName($categoryEntity->getName());

        return $category;
    }

    public function toEntity($row): CategoryEntity
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