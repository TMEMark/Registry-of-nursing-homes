<?php

namespace request;

use Exception;
use service\ServiceProviderService;

class ServiceProviderReqHandler
{
    private ServiceProviderService $serviceProviderService;

    public function __construct(ServiceProviderService $serviceProviderService) {
        $this->serviceProviderService = $serviceProviderService;
    }

    public function handleRequest($method, $id = null) {
        switch ($method){
            case 'GET':
                if ($id !== null) {
                    $this->getServiceProviderWithCategoryAndServiceById($id);
                }else{
                    $this->listServiceProviderWithCategoryAndService();
                }
                break;
            case 'POST':
                $this->createServiceProviderWithCategoryAndService();
                break;
            case 'PUT':
                $this->updateServiceProviderWithCategoryAndService();
                break;
            case 'DELETE':
                $this->deleteServiceProviderWithCategoryAndService($id);
                break;
        }
    }

    public function listServiceProviderWithCategoryAndService(){
        try {
           echo json_encode($this->serviceProviderService->listServiceProviderWithCategoryAndService());
        }catch (Exception $e){
            echo $e;
            return http_response_code(404);
        }
    }

    public function getServiceProviderWithCategoryAndServiceById($id){
        try {
            echo json_encode($this->serviceProviderService->getServiceProviderWithCategoryAndServiceById($id));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    public function createServiceProviderWithCategoryAndService(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->serviceProviderService->insertServiceProvider($data) && http_response_code(201);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    public function updateServiceProviderWithCategoryAndService(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->serviceProviderService->updateServiceProvider($data) && http_response_code(202);
        }catch (Exception $e){
            echo $e;
            return http_response_code(417);
        }
    }

    public function deleteServiceProviderWithCategoryAndService($id){
        try {
            return $this->serviceProviderService->deleteServiceProvider($id) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }


}