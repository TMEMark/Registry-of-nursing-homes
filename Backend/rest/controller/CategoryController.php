<?php

namespace Category;

use rest\request\CategoryReqHandler;
use dao\CategoryDao;
use mapper\CategoryMapper;
use service\CategoryService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../db/DatabaseConnection.php';
require_once '../request/CategoryReqHandler.php';
require_once '../../service/CategoryService.php';
require_once '../../persistance/dao/CategoryDao.php';
require_once '../mapper/CategoryMapper.php';

$controller = new CategoryReqHandler(new CategoryService(new CategoryDao(new CategoryMapper()), new CategoryMapper), new CategoryMapper());
$controller->handleRequests();