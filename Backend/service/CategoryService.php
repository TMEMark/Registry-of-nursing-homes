<?php
include('../persistance/dao/CategoryDao.php');
include('../persistance/entity/CategoryEntity.php');
class CategoryService{
    private CategoryDao $categoryDao;

    public function __construct(CategoryDao $categoryDao) {
        $this->categoryDao = $categoryDao;
    }

    public function getCategoryById(int $id) {
        syslog(LOG_INFO, 'getting category');
        $categoryDao = $this->categoryDao->getCategoryById($id);
        if(empty($categoryDao)){
            syslog(LOG_INFO, 'no category found');
            throw new Exception('no category found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'category found');
            return $categoryDao;
        }
    }

    public function getCategoryByName(String $name){
        syslog(LOG_INFO, 'getting category');
        $categoryDao = $this->categoryDao->getCategoryByName($name);
        if(empty($categoryDao)){
            syslog(LOG_INFO, 'no category found');
            throw new Exception('no category found with name {}', $name);
        }else{
            syslog(LOG_INFO, 'category found');
            return $categoryDao;
        }
    }

    public function listCategorys(){
        syslog(LOG_INFO, 'getting categories');
       $categoryDaoList = $this->categoryDao->listCategorys();
       if(empty($categoryDaoList)){
        syslog(LOG_INFO, 'could not list categories');
        throw new Exception('could not list categories');
       }else{
        syslog(LOG_INFO, 'categories found');
        return $categoryDaoList;
       }
    }

    public function insertCategory(CategoryEntity $category){
        syslog(LOG_INFO, 'creating category');
        $categoryDaoInsert = $this->categoryDao->insertCategory($category);
        if($categoryDaoInsert == null){
            syslog(LOG_INFO, 'could not create category');
            throw new Exception('could not create category');
        }else{
            syslog(LOG_INFO, 'category created');
            return $categoryDaoInsert;
        }
    }

    public function updateCategory(CategoryEntity $category){
        syslog(LOG_INFO, 'updating category');
        $categoryId = $category->getId();
        $categoryDaoGetById = $this->categoryDao->getCategoryById($categoryId);
        syslog(LOG_INFO, 'getting category');
        if(empty($categoryDaoGetById)){
            syslog(LOG_INFO, 'category not found');
            throw new Exception('no category found with id {}', $categoryId);
        }else{
            $categoryDao = $this->categoryDao->updateCategory($category);
            if($categoryDao == null){
                syslog(LOG_INFO, 'could not update category');
                throw new Exception('could not update category');
            }else{
                syslog(LOG_INFO, 'category updated successfully');
                return $categoryDao;
            }
        }
    }

    public function deleteCategory(int $id){
        syslog(LOG_INFO, 'deleting category');
        $categoryDaoDeleted = $this->categoryDao->deleteCategory($id);
        if($categoryDaoDeleted == false){
            syslog(LOG_ERR, 'could not delete category');
            throw new Exception('could not delete category');
        }else{
            syslog(LOG_INFO, 'category deleted');
        }
    }
}

?>