<?php

namespace dao;

use entity\CategoryEntity;
use Exception;
use mapper\CategoryMapper;
use PDO;

require_once '../../rest/mapper/CategoryMapper.php';
class CategoryRepository{

    private CategoryMapper $categoryMapper;

    public function __construct(CategoryMapper $categoryMapper) {
        $this->categoryMapper = $categoryMapper;
    }

    /**
     * Function getCategoryById gets category by id attribute in db
     * @param int $id - $id parameter to get category by
     * @return CategoryEntity if category is found in db | null if it is not found
     */
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

    /**
     * Function getCategoryByName gets category by name attribute in db
     * @param String $name - $name parameter to get category by
     * @return CategoryEntity if category is found in db | null if it is not found
     */
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

    /**
     * Function listCategories gets all categories in db
     * @return array if categories are found | null if they were not found
     */
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

    /**
     * Function insertCategory inserts data into category table in database
     * @param CategoryEntity $category - data to be inserted
     * @return CategoryEntity if category is inserted successfully | null if it is not
     */
    public function insertCategory(CategoryEntity $category): ?CategoryEntity
    {
        global $db;
        try{

            $statement = $db -> prepare ('INSERT INTO category (name) 
            VALUES (:name)');

            $db -> beginTransaction();

            $statement -> execute ([':name'=>$category->getName()]);

            $db->commit();

            $categoryId = $db->lastInsertId();
            $category->setId($categoryId);

            return $category;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not insert category', $category->getId(), $e);
            return null;
        }
    }

    /**
     * Function updateCategory updates data in category table in database by id
     * @param CategoryEntity $category - data to be updated
     * @return CategoryEntity if category is updated successfully | null if it is not
     */
    public function updateCategory(CategoryEntity $category): ?CategoryEntity
    {
        global $db;
        try{

            $statement = $db -> prepare (
            'UPDATE category SET
                    name = :name
            WHERE id = :id');

            $db->beginTransaction();
            $statement -> execute ([':id'=>$category->getId(), ':name'=>$category->getName()]);

            $db->commit();

            return $category;
        }catch(Exception $e){
            $db->rollback();
            error_log('could not update category', $category->getId(), $e);
			return null;
        }
    }

    /**
     * Function deleteCategory delete data in category table in database by id
     * @param int $id - $id by which category entry is deleted in db
     * @return bool
     */
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