<?php

namespace request;

use Exception;
use service\RoleService;

class RoleReqHandler
{
    private RoleService $roleService;

    public function __construct(RoleService $roleService) {
        $this->roleService = $roleService;
    }

    public function handleRequest($method) {
        switch ($method){
            case 'GET':
                $this->listRoles();
        }
    }

    public function listRoles(){
        try {
            echo json_encode($this->roleService->listRoles());
        }catch (Exception $e){
            echo $e;
            return http_response_code(404);
        }
    }
}