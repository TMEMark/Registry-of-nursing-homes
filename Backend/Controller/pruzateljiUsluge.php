<?php
require "../Database/pdo.php";
require "../Repo/CUD/pruzateljiUslugeTest.php";

if (isset($_POST['idPruzUsl']) && $_POST['idPruzUsl'] == ""){
    $pruzatelj = $_POST['pruzatelj'];
    $usl = $_POST['usluga'];
    foreach ($usl as $usluga){
        insertPU($pruzatelj,$usluga);
    }
    header("Location:../../Frontend/Pages/form_pruzateljiUslugeKategorije.php");

    
}
