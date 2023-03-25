<?php

namespace service;

use dao\CategoryDao;
use entity\CategoryEntity;
use Exception;
use mapper\CategoryMapper;


class CategoryService{
    private CategoryDao $categoryDao;
    private CategoryMapper $categoryMapper;

    public function __construct(CategoryDao $categoryDao, CategoryMapper $categoryMapper) {
        $this->categoryDao = $categoryDao;
        $this->categoryMapper = $categoryMapper;
    }

    public function getCategoryById(int $id): \dto\CategoryDto
    {
        syslog(LOG_INFO, 'getting category');
        $categoryDao = $this->categoryMapper->toDto($this->categoryDao->getCategoryById($id));


        if(empty($categoryDao)){
            syslog(LOG_INFO, 'no category found');
            throw new Exception('no category found with id {}', $id);
        }else{
            syslog(LOG_INFO, 'category found');
            return $categoryDao;
        }
    }

    public function getCategoryByName(String $name): \dto\CategoryDto
    {
        syslog(LOG_INFO, 'getting category');
        $categoryDao = $this->categoryMapper->toDto($this->categoryDao->getCategoryByName($name));
        if(empty($categoryDao)){
            syslog(LOG_INFO, 'no category found');
            throw new Exception('no category found with name {}', $name);
        }else{
            syslog(LOG_INFO, 'category found');
            return $categoryDao;
        }
    }

    public function listCategories(): array
    {
        syslog(LOG_INFO, 'getting categories');
       $categoryDaoList = $this->categoryDao->listCategories();
       $categoryDTOList = [];
        foreach ($categoryDaoList as $category) {
            $categoryDTO = $this->categoryMapper->toDto($category);
            $categoryDTOList[] = $categoryDTO;
        }
       if(empty($categoryDTOList)){
        syslog(LOG_INFO, 'could not list categories');
        throw new Exception('could not list categories');
       }else{
        syslog(LOG_INFO, 'categories found');
        return $categoryDTOList;
       }
    }

    public function insertCategory(array $category): \dto\CategoryDto
    {
        syslog(LOG_INFO, 'creating category');
        $category = $this->categoryMapper->fromStdClass($category);
        $categoryInsert = $this->categoryMapper->toDto($this->categoryDao->insertCategory($category));
        if($categoryInsert == null){
            syslog(LOG_INFO, 'could not create category');
            throw new Exception('could not create category');
        }else{
            syslog(LOG_INFO, 'category created');
            return $categoryInsert;
        }
    }

    public function updateCategory(array $category): \dto\CategoryDto
    {
        syslog(LOG_INFO, 'updating category');
        $category = $this->categoryMapper->updateMapper($category);

        $categoryId = $category->getId();
        $categoryDaoGetById = $this->categoryDao->getCategoryById($categoryId);
        syslog(LOG_INFO, 'getting category');

        if(empty($categoryDaoGetById)){
            syslog(LOG_INFO, 'category not found');
            throw new Exception('no category found with id {}', $categoryId);
        }else{
            $categoryUpdate = $this->categoryMapper->toDto($this->categoryDao->updateCategory($category));
            if($categoryUpdate == null){
                syslog(LOG_INFO, 'could not update category');
                throw new Exception('could not update category');
            }else{
                syslog(LOG_INFO, 'category updated successfully');
                return $categoryUpdate;
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