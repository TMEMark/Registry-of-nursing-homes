<?php

namespace service;

use dao\RoleRepository;
use mapper\RoleMapper;

class RoleService
{

    private RoleRepository $roleDao;

    private RoleMapper $roleMapper;

    public function __construct(RoleRepository $roleDao, RoleMapper $roleMapper) {
        $this->roleDao = $roleDao;
        $this->roleMapper = $roleMapper;
    }
    public function listRoles(): array
    {
        syslog(LOG_INFO, 'getting roles');
        $roleDaoList = $this->roleDao->listRoles();
        if(empty($roleDaoList)) {
            syslog(LOG_INFO, 'could not list roles');
            throw new Exception('could not list roles');
        }else{
            $roleDTOList = [];
            foreach ($roleDaoList as $role) {
                $roleDTO = $this->roleMapper->toDto($role);
                $roleDTOList[] = $roleDTO;
            }
            syslog(LOG_INFO, 'roles found');
            return $roleDTOList;
        }
    }
}