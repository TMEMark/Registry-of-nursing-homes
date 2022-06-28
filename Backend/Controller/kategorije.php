<?php
//Ne radi jer funkcija za brisanje ne koristi i nema definirane varijable idkat i nazivkat u fileu pruzatelji, a insert i update ne radi
//jer u fileu di je insert i update nema varijable za iddeletekat

require "../Database/pdo.php";
require "../Repo/CUD/kategorije.php";


//if statements that call functions 

if(isset($_POST['id_kat']) && $_POST['id_kat'] == ""){
    $nazivKat = $_POST['nazivKat'];
    if(empty($nazivKat)){
        header("Location:../../Frontend/Pages/form_kategorije.php?data=empty");
    }else{
        insertKategorije($nazivKat);
        header("Location:../../Frontend/Pages/kategorije.php");
    }
}

if(isset($_POST['id_kat']) && $_POST['id_kat'] > 0){
    $idKat = $_POST['id_kat']; 
    $nazivKat = $_POST['nazivKat'];
    updateKategorije($idKat,$nazivKat);
    header("Location:../../Frontend/Pages/kategorije.php");
}

if(isset($_GET['delete'])){
    $idDeleteKat = $_GET['delete'];
    deleteKategorije($idDeleteKat);
    header("Location:../../Frontend/Pages/kategorije.php");
}
?>