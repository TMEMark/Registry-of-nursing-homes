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

    public function handleRequest($method, $id = null, $name = null) {
        switch ($method){
            case 'GET':
                if ($id !== null) {
                    $this->getServiceProviderWithCategoryAndServiceById($id);
                } else if($name !== null){
                    $this->getServiceByName($name);
                }else{
                    $this->listServiceProviderWithCategoryAndService();
                }
                break;
            case 'POST':
                break;
            case 'PUT':
                break;
            case 'DELETE':
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


}