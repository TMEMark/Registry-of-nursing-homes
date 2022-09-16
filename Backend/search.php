<?php
require "Database/pdo.php";
require "Repo/Read/index.php";

    $search = $_GET['search'];
    $zupanija = $_GET['zupanija'];
    $usluga = $_GET['usluga'];
    $kategorija = $_GET['kategorija'];
    $searchTest = searchTest($search,$zupanija,$usluga,$kategorija);

    //header("Location:../../Frontend/Pages/index.php?search=".$search."&zupanija=".$zupanija."&usluga=".$usluga."&kategorija=".$kategorija."&submit=Prikaži");


    //http://localhost/Registry-of-nursing-homes-main/Backend/Controller/search.php?search=&zupanija=%C5%BDUPANIJA&usluga=USLUGE&kategorija=KATEGORIJE&submit=Prika%C5%BEi



