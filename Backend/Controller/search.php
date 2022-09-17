<?php
require "../Database/pdo.php";
require "../Repo/Read/index.php";

if(isset($_GET['search']) > 0 || isset($_GET['zupanija']) > 0 || isset($_GET['usluga']) > 0 || isset($_GET['kategorija']) > 0){
    $search = $_GET['search'];
    $zupanija = $_GET['zupanija'];
    $usluga = $_GET['usluga'];
    $kategorija = $_GET['kategorija'];
    $searchTest = searchTest($search,$zupanija,$usluga,$kategorija);
    
    header("Location:../../Frontend/Pages/index.php?search=".$search."&zupanija=".$zupanija."&usluga=".$usluga."&kategorija=".$kategorija."&submit=Prikaži");
}else{
    header("Location:../../Frontend/Pages/index.php");
}



