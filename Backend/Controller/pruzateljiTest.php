<?php
require "../Database/pdo.php";
require "../Repo/CUD/pruzateljiTest.php";

// Variables that fetch data from form using POST for insert and update function




//if statements that call functions 

if (isset($_POST['idPruz']) && $_POST['idPruz'] == ""){
    $nazivPruzatelja = $_POST['naziv_pruzatelja'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];
    $kontakt = $_POST['kontakt'];
    $URL = $_POST['url'];
    $radnVr = $_POST['radn_vr'];
    $napomena = $_POST['napomena'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];
    $lokacija = $_POST['lokacija'];
    $oib = $_POST['oib'];

    insertPruzatelj($nazivPruzatelja, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $lokacija, $oib);
    header("Location:../../Frontend/Pages/form_pruzateljiUsluge.php");
}

if(isset($_POST['idPruz']) && $_POST['idPruz'] > 0){
    $idPruz = $_POST['idPruz'];
    $nazivPruzatelja = $_POST['naziv_pruzatelja'];
    $oib = $_POST['oib'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];
    $kontakt = $_POST['kontakt'];
    $URL = $_POST['url'];
    $radnVr = $_POST['radn_vr'];
    $napomena = $_POST['napomena'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];
    $lokacija = $_POST['lokacija'];
    
    updatePruzatelj($idPruz, $nazivPruzatelja, $oib, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $lokacija);
    header("Location:../../Frontend/Pages/form_pruzateljiUsluge.php");
}


if(isset($_GET['delete'])){
    $idDeletePruz = $_GET['delete'];
    deletePruzatelj($idDeletePruz);
    header("Location:../../Frontend/Pages/pruzatelji.php");   
} 


?>