<?php

use dao\UserRepository;
use mapper\UserMapper;
use request\AuthReqHandler;
use service\AuthService;

$reqHandler = new AuthReqHandler(new AuthService(new UserRepository(new UserMapper())));

$request = $action = $_GET['action'];

$reqHandler->handleRequest($request);
