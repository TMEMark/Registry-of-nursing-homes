<?php
require "Database/pdo.php";
require "Repo/Read/index.php";

$selectAdmin = selectAdministratori();
$selectAdminUloge = selectAdministratoriUloge();
$selectKat = selectKategorije();
$selectPruz = selectPruzatelji();
$selectUsl = selectUsluge();
$selectPruzUslKat = selectPruzUslKat();
$selectLok = selectLok();
$selectPruzLok = selectPruzLok();
$getLastInserted = getLastInserted();
$getLastUsl = getLastUsl();
