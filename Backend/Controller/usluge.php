<?php
require "../Database/pdo.php";
require "../Repo/CUD/usluge.php";

// Variables that fetch data from form using POST for insert and update function



//if statements that call functions 

if (isset($_POST['id_usl']) && $_POST['id_usl'] == ""){
    $nazivUsl = $_POST['naziv_usl'];
    if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$nazivUsl)){
        header("Location:../../Frontend/Pages/form_usluge.php?data=empty");
    }else{
        insertUsluge($nazivUsl);
        header("Location:../../Frontend/Pages/usluge.php");
    }
}

if(isset($_POST['id_usl']) && $_POST['id_usl'] > 0){
    $idUsl = $_POST['id_usl'];
    $nazivUsl = $_POST['naziv_usl'];
    updateUsluge($idUsl,$nazivUsl);
    header("Location:../../Frontend/Pages/usluge.php");
}
if(isset($_GET['delete'])){
    $idDeleteUsl = $_GET['delete'];
    deleteUsluge($idDeleteUsl);
    header("Location:../../Frontend/Pages/usluge.php");
}   
?>