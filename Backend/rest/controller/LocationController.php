
<?php

use mapper\LocationMapper;
use rest\request\LocationReqHandler;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../../persistance/dao/LocationDao.php';
require_once '../../../persistance/mapper/LocationMapper.php';
require_once '../../../service/LocationService.php';
require_once '../../../db/DatabaseConnection.php';
require_once '../request/LocationReqHandler.php';

$controller = new LocationReqHandler(new LocationService(new LocationDao(new LocationMapper())));
$controller->handleRequests();