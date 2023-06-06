<?php

namespace request;

use Exception;

class LocationReqHandler
{
    private LocationService $locationService;

    public function __construct($locationService) {
        $this->locationService = $locationService;
    }

    public function handleRequest($method, $id = null, $name = null) {
        switch ($method) {
            case 'GET':
                if ($id !== null) {
                    $this->getLocationById($id);
                } else if($name !== null){
                    $this->getLocationByName($name);
                }else{
                    $this->listLocations();
                }
                break;
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

    private function listLocations() {
        try {
            echo json_encode($this->locationService->listLocations());
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getLocationById(int $id) {
        try {
            echo json_encode($this->locationService->getLocationById($id));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function getLocationByName(String $name) {
        try {
            echo json_encode($this->locationService->getLocationByName($name));
        }catch (Exception $e){
            return http_response_code(404);
        }
    }

    private function createLocation() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->locationService->insertLocation($data) && http_response_code(201);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function updateLocation() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, true);
        try {
            return $this->locationService->updateLocation($data) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }

    private function deleteLocation(int $id) {
        try {
            return $this->locationService->deleteLocation($id) && http_response_code(202);
        }catch (Exception $e){
            return http_response_code(417);
        }
    }
}