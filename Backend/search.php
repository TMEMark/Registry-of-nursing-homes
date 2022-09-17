<?php
require "Database/pdo.php";
require "Repo/Read/index.php";

$search = $_GET['search'] ?? null;
$zupanija = $_GET['zupanija'] ?? null;
$usluga = $_GET['usluga'] ?? null;
$kategorija = $_GET['kategorija'] ?? null;
$searchTest = searchTest($search,$zupanija,$usluga,$kategorija);

$selectUsl = selectUsluge();
$selectLok = selectLok();
$selectKat = selectKategorije();



