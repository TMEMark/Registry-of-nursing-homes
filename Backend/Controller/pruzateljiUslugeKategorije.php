<?php
require "../Database/pdo.php";
require "../Repo/CUD/pruzateljiUslugeKategorijeTest.php";

if (isset($_POST['idPruzUslKat']) && $_POST['idPruzUslKat'] == ""){
    $pruzateljUsluga = $_POST['pruzateljUsluga'];
    $kat = $_POST['kategorija'];
    foreach ($kat as $kategorija){
        insertPUK($pruzateljUsluga, $kategorija);
    }
    header("Location:../../Frontend/Pages/pruzatelji.php");

    
}
