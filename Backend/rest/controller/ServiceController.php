
<?php

use dao\ServiceDao;
use mapper\ServiceMapper;
use rest\request\ServiceReqHandler;
use service\ServiceService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/dao/ServiceDao.php';
require_once '../mapper/ServiceMapper.php';
require_once '../../service/ServiceService.php';
require_once '../../db/DatabaseConnection.php';
require_once '../request/ServiceReqHandler.php';

$controller = new ServiceReqHandler(new ServiceService(new ServiceDao(new ServiceMapper())));
$controller->handleRequests();