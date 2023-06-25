<?php

namespace request;

use Exception;
use service\UserService;

class UserReqHandler
{
    private UserService $userService;

    public function __construct($userService) {
        $this->userService = $userService;
    }

    public function handleRequest($method, $id = null, $name = null) {
        switch ($method) {
            case 'GET':
                if ($id !== null) {
                    $this->getUserById($id);
                } else if($name !== null){
                    $this->getUserByName($name);
                }else{
                    $this->listUsers();
                }
                break;
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

    private function listUsers() {
        try {
            echo json_encode($this->userService->listUsers());
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getUserById(int $id) {
        try {
            echo json_encode($this->userService->getUserById($id));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getUserByName(String $name) {
        try {
            echo json_encode($this->userService->getUserByName($name));
        }catch (Exception $e){
            return http_response_code(404);
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
}