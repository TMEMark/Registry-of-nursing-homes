<?php

use dao\CategoryDao;
use dao\LocationDao;
use dao\ServiceDao;
use dao\ServiceProviderCategoryDao;
use dao\ServiceProviderDao;
use dao\ServiceProviderServiceDao;
use mapper\CategoryMapper;
use mapper\LocationMapper;
use mapper\ServiceMapper;
use mapper\ServiceProviderCategoryMapper;
use mapper\ServiceProviderMapper;
use mapper\ServiceProviderServiceMapper;
use request\ServiceProviderReqHandler;
use service\ServiceProviderService;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');

require_once '../../persistance/dao/ServiceDao.php';
require_once '../../persistance/dao/CategoryDao.php';
require_once '../../persistance/dao/LocationDao.php';
require_once '../../persistance/dao/ServiceProviderDao.php';
require_once '../../persistance/dao/ServiceProviderCategoryDao.php';
require_once '../../persistance/dao/ServiceProviderServiceDao.php';
require_once '../mapper/ServiceMapper.php';
require_once '../mapper/CategoryMapper.php';
require_once '../mapper/ServiceProviderMapper.php';
require_once '../mapper/ServiceProviderCategoryMapper.php';
require_once '../mapper/ServiceProviderServiceMapper.php';
require_once '../request/ServiceProviderReqHandler.php';
require_once '../../db/DatabaseConnection.php';
require_once '../../service/ServiceProviderService.php';

$reqHandler = new ServiceProviderReqHandler(new ServiceProviderService(new ServiceProviderDao(new ServiceProviderMapper()),
    new ServiceProviderCategoryDao(new ServiceProviderCategoryMapper()), new ServiceProviderServiceDao(new ServiceProviderServiceMapper()),
    new CategoryDao(new CategoryMapper()), new ServiceDao(new ServiceMapper()), new ServiceProviderMapper(), new LocationDao(new LocationMapper()), new LocationMapper()));

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;

$reqHandler->handleRequest($method, $id, $name);