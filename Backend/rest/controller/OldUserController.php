
<?php

use dao\RoleRepository;
use dao\UserRepository;
use mapper\RoleMapper;
use mapper\UserMapper;
use rest\request\OldUserReqHandler;
use service\UserService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/repository/UserRepository.php';
require_once '../../persistance/repository/RoleRepository.php';
require_once '../../persistance/helper/IdGenerator.php';
require_once '../mapper/UserMapper.php';
require_once '../../service/UserService.php';
require_once '../../db/DatabaseConnection.php';
require_once '../request/OldUserReqHandler.php';

$controller = new OldUserReqHandler(new UserService(new UserRepository(new UserMapper()), new RoleRepository(new RoleMapper()), new UserMapper(), new RoleMapper()));
$controller->handleRequests();