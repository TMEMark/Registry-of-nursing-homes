<?php

namespace dao;

use entity\CategoryEntity;
use Exception;
use mapper\CategoryMapper;
use PDO;

require_once '../../rest/mapper/CategoryMapper.php';
class CategoryDao{

    private CategoryMapper $categoryMapper;

    public function __construct(CategoryMapper $categoryMapper) {
        $this->categoryMapper = $categoryMapper;
    }

    public function getCategoryById(int $id): ?CategoryEntity
    {
        global $db;
        try{
            $sql = 'SELECT * FROM category WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->categoryMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find category {}', $id);
			return null;
        }
    }

    public function getCategoryByName(String $name): ?CategoryEntity
    {
        global $db;
        $sql = 'SELECT * FROM category WHERE name = :name';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->categoryMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not find category');
			return null;
        }
    }

    public function listCategories(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM category';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->categoryMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find category', $e);
			return null;
        }
    }

    public function insertCategory(CategoryEntity $category): ?CategoryEntity
    {
        global $db;
        $id =  abs( crc32( uniqid() ) );
        try{

            $statement = $db -> prepare ('INSERT INTO category (id,name) 
            VALUES (:id,:name)');

            $db -> beginTransaction();

            $statement -> execute ([':id'=>$id, ':name'=>$category->getName()]);

            $db->commit();

            $sql = 'SELECT * FROM category WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->categoryMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not create category {}', $id, $e);
            $db->rollback();
			return null;
        }
    }

    public function updateCategory(CategoryEntity $category): ?CategoryEntity
    {
        print_r($category);
        global $db;
        try{

            $statement = $db -> prepare (
            'UPDATE category SET
                    name = :name
            WHERE id = :id');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$category->getId(), ':name'=>$category->getName()]);

            $db->commit();

            $sql = 'SELECT * FROM category WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $category->getId());
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->categoryMapper->toEntity($result);
        }catch(Exception $e){
            error_log('could not update category', $category->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteCategory(int $id): bool
    {
        global $db;
        try{

            $statement = $db -> prepare ('DELETE FROM category
            WHERE id = :id ');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$id]);

            $db->commit();
            return true;
        }catch(Exception $e){
            error_log('could not delete category {}', $id, $e);
            $db->rollback();
			return false;
        }
    }
}
?>