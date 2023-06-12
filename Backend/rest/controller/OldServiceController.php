
<?php

use dao\ServiceRepository;
use mapper\ServiceMapper;
use rest\request\ServiceReqHandler;
use service\ServiceService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/repository/ServiceRepository.php';
require_once '../mapper/ServiceMapper.php';
require_once '../../service/ServiceService.php';
require_once '../../db/DatabaseConnection.php';
require_once '../request/OldServiceReqHandler.php';

$controller = new ServiceReqHandler(new ServiceService(new ServiceRepository(new ServiceMapper()), new ServiceMapper()));
$controller->handleRequests();