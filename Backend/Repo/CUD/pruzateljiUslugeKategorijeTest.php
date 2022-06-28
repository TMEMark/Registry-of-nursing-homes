<?php

function insertPUK($pruzateljUsluga, $kategorija){
    global $db;
    $countPruzUslKat = 0;
    $queryPruzUslKat = "INSERT INTO pruzatelji_usluge_kategorije (pruzatelj_usluga, kategorija) VALUES (:pruzatelj_usluga, :kategorija)";
    $statementPruzUslKat = $db->prepare($queryPruzUslKat);
    $statementPruzUslKat->bindValue(":pruzatelj_usluga", $pruzateljUsluga);
    $statementPruzUslKat->bindValue(":kategorija", $kategorija);

    if ($statementPruzUslKat -> execute()) {
        $countPruzUslKat = $statementPruzUslKat ->rowCount();

    };
    $statementPruzUslKat->closeCursor();
    return $countPruzUslKat;
}