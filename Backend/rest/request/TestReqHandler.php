<?php

namespace rest\request;

use Exception;
use service\ServiceService;

class TestReqHandler
{

    private ServiceService $serviceService;

    public function __construct($serviceService) {
        $this->serviceService = $serviceService;
    }

    public function handleRequest($method, $id = null, $name = null) {
        switch ($method) {
            case 'GET':
                if ($id !== null) {
                    $this->getServiceById($id);
                } else if($name !== null){
                    $this->getServiceByName($name);
                }else{
                    $this->listServices();
                }
                break;
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

    private function listServices() {
        try {
            echo json_encode($this->serviceService->listServices());
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getServiceById(int $id) {
        try {
            echo json_encode($this->serviceService->getServiceById($id));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getServiceByName(String $name) {
        try {
            echo json_encode($this->serviceService->getServiceByName($name));
        }catch (Exception $e){
            return http_response_code(404);
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
}