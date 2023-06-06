<?php

namespace request;

use Exception;
use service\CategoryService;

class CategoryReqHandler
{
    private CategoryService $categoryService;

    public function __construct($categoryService) {
        $this->categoryService = $categoryService;
    }

    public function handleRequest($method, $id = null, $name = null) {
        switch ($method) {
            case 'GET':
                if ($id !== null) {
                    $this->getCategoryById($id);
                } else if($name !== null){
                    $this->getCategoryByName($name);
                }else{
                    $this->listCategories();
                }
                break;
            case 'POST':
                $this->createCategory();
                break;
            case 'PUT':
                $this->updateCategory();
                break;
            case 'DELETE':
                $this->deleteCategory($id);
                break;
            default:
                // Handle invalid method
                break;
        }
    }

    private function listCategories() {
        try {
            echo json_encode($this->categoryService->listCategories());
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getCategoryById(int $id) {
        try {
            echo json_encode($this->categoryService->getCategoryById($id));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getCategoryByName(String $name) {
        try {
            echo json_encode($this->categoryService->getCategoryByName($name));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function createCategory() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->categoryService->insertCategory($data) && http_response_code(201);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function updateCategory() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->categoryService->updateCategory($data) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function deleteCategory(int $id) {
        try {
            return $this->categoryService->deleteCategory($id) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }
}