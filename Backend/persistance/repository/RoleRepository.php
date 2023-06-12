<?php

namespace dao;

use entity\RoleEntity;
use Exception;
use mapper\RoleMapper;
use PDO;

require_once '../../rest/mapper/RoleMapper.php';
class RoleRepository{

    private RoleMapper $roleMapper;

    public function __construct(RoleMapper $roleMapper) {
        $this->roleMapper = $roleMapper;
    }

    /**
     * Function listRoles gets all roles in db
     * @return array if roles are found | null if they were not found
     */
    public function listRoles(): ?array
    {
        global $db;
        $sql = 'SELECT * FROM role';
        try{
            $statement = $db->prepare($sql);
            if ($statement->execute()) {
                $result = [];
                while ($row = $statement->fetch()) {
                    $result[] = $this->roleMapper->toEntity($row);
                }
                return $result;
            }
            return [];
        }catch(Exception $e){
            error_log('could not find role', $e);
			return null;
        }
    }
}
?>