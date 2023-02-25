<?php
class CategoryMapper {
    public function toEntity($row){
        $category = new CategoryEntity();
        $category->setId($row['id']);
        $category->setCreated($row['created']);
        $category->setLastModified($row['last_modified']);
        $category->setName($row['name']);

        return $category;
    }
}
?>