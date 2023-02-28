<?php
include '../Database/pdo.php';
include "../Repo/Read/index.php";
include "sortFunction.php";

$select = selectAdministartori();

usort($select, "desc");

foreach ($select as $key) {
    echo $key["ime_admina"] , "<br>";
}
?>

