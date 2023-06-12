
<?php

use dao\LocationRepository;
use mapper\LocationMapper;
use rest\request\OldLocationReqHandler;
use service\LocationService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/repository/LocationRepository.php';
require_once '../../service/LocationService.php';
require_once '../../db/DatabaseConnection.php';
require_once '../request/OldLocationReqHandler.php';
require_once '../mapper/LocationMapper.php';

$controller = new OldLocationReqHandler(new LocationService(new LocationRepository(new LocationMapper()), new LocationMapper()));
$controller->handleRequests();