<?php
include '../Database/pdo.php';
include "../select.php";
include "sortFunction.php";


usort($selectAdmin, "desc");

foreach ($selectAdmin as $key) {
    echo $key["ime_admina"] , "<br>";
}
?>

