
<?php

use dao\RoleDao;
use dao\UserDao;
use helper\IdGenerator;
use mapper\RoleMapper;
use mapper\UserMapper;
use rest\request\UserReqHandler;
use service\UserService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/dao/UserDao.php';
require_once '../../persistance/dao/RoleDao.php';
require_once '../../persistance/helper/IdGenerator.php';
require_once '../mapper/UserMapper.php';
require_once '../../service/UserService.php';
require_once '../../db/DatabaseConnection.php';
require_once '../request/UserReqHandler.php';

$controller = new UserReqHandler(new UserService(new UserDao(new UserMapper(), new IdGenerator()), new RoleDao(new RoleMapper()), new UserMapper(), new RoleMapper()));
$controller->handleRequests();