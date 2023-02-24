<?php
include('../mapper/CategoryMapper.php');
include("../entity/CategoryEntity.php");
class CategoryDao{

    private final CategoryMapper $categoryMapper;

    public function __construct(CategoryMapper $categoryMapper) {
        $this->categoryMapper = $categoryMapper;
    }

    public function getCategoryById(int $id){
        global $db;
        try{
            $sql = 'SELECT * FROM category WHERE id = :id';
            $statement = $db->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();                                           
            foreach ($array as $row){
                $array[] = $this->categoryMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find category {}', $id, $e);
			return null;
        }
    }

    public function getCategoryByName(String $name){
        global $db;
        $sql = 'SELECT * FROM category WHERE name = :"name"';
        try{
            $statement = $db->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->categoryMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find category {}', $name, $e);
			return null;
        }
    }

    public function listCategorys(){
        global $db;
        $sql = 'SELECT * FROM category';
        try{
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($array as $row){
                $array[] = $this->categoryMapper->toEntity($row);
            }
            return $array;
        }catch(Exception $e){
            error_log('could not find category', $e);
			return null;
        }
    }

    public function insertCategory(CategoryEntity $category){
        global $db;
        $id =  abs( crc32( uniqid() ) );;
        try{

            $db->beginTransaction();
            $db -> query = 
            'INSERT INTO category (id,"name") 
            VALUES (:id,:"name")';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':name', $category->getName());
            $statement->closeCursor();

            $db->commit();
            return $category;
        }catch(Exception $e){
            error_log('could not create category {}', $category->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function updateCategory(CategoryEntity $category){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query =
            'UPDATE category SET
            "name" = :"name",
            WHERE id = :id';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $category->getId());
            $statement->bindValue(':"name"', $category->getName());
            $statement->closeCursor();

            $db->commit();
            return $category;
        }catch(Exception $e){
            error_log('could not update category {}', $category->getId(), $e);
            $db->rollback();
			return null;
        }
    }

    public function deleteCategory(int $id){
        global $db;
        try{
            $db->beginTransaction();
            $db -> query = 
            'DELETE FROM category
            WHERE id = :id ';
            $statement = $db->prepare($db);
            $statement->bindValue(':id', $id);
            $statement->closeCursor();

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