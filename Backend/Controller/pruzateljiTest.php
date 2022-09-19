<?php
require "../Database/pdo.php";
require "../Repo/CUD/pruzateljiTest.php";

// Variables that fetch data from form using POST for insert and update function




//if statements that call functions 

if (isset($_POST['idPruz']) && $_POST['idPruz'] == ""){
    $idPruz = $_POST['idPruz'];
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

    $pruzatelj = $_POST["idPruz"];
    $usluga = $_POST["usluga"];

    $pruzateljUsluga = $_POST["pruzateljUsluga"];
    $kategorija = $_POST["kategorija"];

    insertPruzatelj($idPruz, $nazivPruzatelja, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $lokacija, $pruzatelj, $usluga, $pruzateljUsluga, $kategorija);
    header("Location:../../Frontend/Pages/pruzatelji.php");
}

if(isset($_POST['idPruz']) && $_POST['idPruz'] > 0){
    $idPruz = $_POST['idPruz'];
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

    $idPruzUsl = $_POST["idPruzUsl"];
    $pruzatelj = $_POST["idPruz"];
    $usluga = $_POST["usluga"];

    $idPruzUslKat = $_POST["idPruzUslKat"];
    $pruzateljUsluga = $_POST["pruzateljUsluga"];
    $kategorija = $_POST["kategorija"];

    updatePruzatelj($idPruz, $nazivPruzatelja, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $lokacija, $idPruzUsl, $pruzatelj, $usluga, $idPruzUslKat, $pruzateljUsluga, $kategorija);
    header("Location:../../Frontend/Pages/pruzatelji.php");
}

if(isset($_GET['delete'])){
    $idDeletePruz = $_GET['delete'];
    deletePruzatelj($idDeletePruz);
    header("Location:../../Frontend/Pages/pruzatelji.php");   
} 
?>