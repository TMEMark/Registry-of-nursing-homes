<?php

use dao\UserRepository;
use mapper\UserMapper;
use request\AuthReqHandler;
use service\AuthService;

require_once '../../db/DatabaseConnection.php';
require_once '../request/AuthReqHandler.php';
require_once '../../service/AuthService.php';
require_once '../../persistance/repository/UserRepository.php';
require_once '../mapper/UserMapper.php';

$reqHandler = new AuthReqHandler(new AuthService(new UserRepository(new UserMapper())));

$request = $_POST['action'];
$username = $_POST['username'];
$password = $_POST['password'];

$reqHandler->handleRequest($request, ['username' => $username, 'password' => $password]);
