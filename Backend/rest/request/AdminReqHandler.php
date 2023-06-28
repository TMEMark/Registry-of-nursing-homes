<?php

namespace request;

use Exception;
use service\AuthService;
use service\CategoryService;
use service\LocationService;
use service\ServiceProviderService;
use service\ServiceService;
use service\UserService;

class AdminReqHandler
{
    private CategoryService $categoryService;
    private LocationService $locationService;
    private UserService $userService;
    private ServiceService $serviceService;
    private ServiceProviderService $serviceProviderService;

    private AuthService $authService;

    public function __construct($categoryService, $locationService, $userService, $serviceService, $serviceProviderService, $authService) {
        $this->categoryService = $categoryService;
        $this->locationService = $locationService;
        $this->userService = $userService;
        $this->serviceService = $serviceService;
        $this->serviceProviderService = $serviceProviderService;
        $this->authService = $authService;
    }
    public function handleRequest($entity, $method, $id = null) {
        session_start();
        if (!$this->authService->isUserAuthenticated()) {
            http_response_code(401); // Unauthorized
            return;
        }
        switch ($entity) {
            case 'category':
                $this->handleCategoryRequest($method, $id);
                break;
            case 'location':
                $this->handleLocationRequest($method, $id);
                break;
            case 'user':
                $this->handleUserRequest($method, $id);
                break;
            case 'service':
                $this->handleServiceRequest($method, $id);
                break;
            case 'serviceProvider':
                $this->handleServiceProviderRequest($method, $id);
                break;
            default:
                break;
        }
    }

    private function handleCategoryRequest($method, $id) {
        switch ($method) {
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

    public function handleLocationRequest($method, $id = null) {
        switch ($method) {
            case 'POST':
                $this->createLocation();
                break;
            case 'PUT':
                $this->updateLocation();
                break;
            case 'DELETE':
                $this->deleteLocation($id);
                break;
            default:
                // Handle invalid method
                break;
        }
    }

    private function createLocation() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->locationService->insertLocation($data) && http_response_code(201);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    private function updateLocation() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->locationService->updateLocation($data) && http_response_code(202);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    private function deleteLocation(int $id) {
        try {
            return $this->locationService->deleteLocation($id) && http_response_code(202);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    private function handleUserRequest($method, $id) {
        switch ($method) {
            case 'POST':
                $this->createUser();
                break;
            case 'PUT':
                $this->updateUser();
                break;
            case 'DELETE':
                $this->deleteUser($id);
                break;
            default:
                // Handle invalid method
                break;
        }
    }

    private function createUser() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->userService->insertUser($data) && http_response_code(201);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function updateUser() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->userService->updateUser($data) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function deleteUser(int $id) {
        try {
            return $this->userService->deleteUser($id) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function handleServiceRequest($method, $id) {
        switch ($method) {
            case 'POST':
                $this->createService();
                break;
            case 'PUT':
                $this->updateService();
                break;
            case 'DELETE':
                $this->deleteService($id);
                break;
            default:
                // Handle invalid method
                break;
        }
    }

    private function createService() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->serviceService->insertService($data) && http_response_code(201);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function updateService() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->serviceService->updateService($data) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function deleteService(int $id) {
        try {
            return $this->serviceService->deleteService($id) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function handleServiceProviderRequest($method, $id) {
        switch ($method) {
            case 'POST':
                $this->createServiceProvider();
                break;
            case 'PUT':
                $this->updateServiceProvider();
                break;
            case 'DELETE':
                $this->deleteServiceProvider($id);
                break;
            default:
                // Handle invalid method
                break;
        }
    }

    public function createServiceProvider(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->serviceProviderService->insertServiceProvider($data) && http_response_code(201);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    public function updateServiceProvider(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->serviceProviderService->updateServiceProvider($data) && http_response_code(202);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    public function deleteServiceProvider($id){
        try {
            return $this->serviceProviderService->deleteServiceProvider($id) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

}