<?php

function insertPUK($pruzatelj,$usluga,$pruzateljUsluga, $kategorija){
    
    global $db;

    $countPruzUsl = 0;
    $queryPruzUsl = "INSERT INTO pruzatelji_usluge (pruzatelj, usluga) VALUES (:pruzatelj, :usluga)";
    $statementPruzUsl = $db->prepare($queryPruzUsl);
    $statementPruzUsl->bindValue(":pruzatelj", $pruzatelj);
    $statementPruzUsl->bindValue(":usluga", $usluga);

    $countPruzUslKat = 0;
    $queryPruzUslKat = "INSERT INTO pruzatelji_usluge_kategorije (pruzatelj_usluga, kategorija) VALUES (:pruzatelj_usluga, :kategorija)";
    $statementPruzUslKat = $db->prepare($queryPruzUslKat);
    $statementPruzUslKat->bindValue(":pruzatelj_usluga", $pruzateljUsluga);
    $statementPruzUslKat->bindValue(":kategorija", $kategorija);

    if ($statementPruzUsl -> execute() && $statementPruzUslKat -> execute()) {
        $countPruzUsl = $statementPruzUsl ->rowCount();
        $countPruzUslKat = $statementPruzUslKat ->rowCount();
    };

    $statementPruzUsl->closeCursor();
    $statementPruzUslKat->closeCursor();

    return $countPruzUsl;   
    return $countPruzUslKat;
}

function updatePruzatelj($idPruzUsl, $pruzatelj, $usluga, $idPruzUslKat, $pruzateljUsluga, $kategorija){
    global $db;
    $countPruzUsl = 0;
    $countPruzUslKat = 0;

    $queryPruzUsl = ("UPDATE pruzatelji_usluge
    SET pruzatelj = :pruzatelj,
    usluga = :usluga
    WHERE idPruzUsl = :idPruzUsl ");
    $statementPruzUsl = $db->prepare($queryPruzUsl);
    $statementPruzUsl->bindValue(':idPruzUsl', $idPruzUsl);
    $statementPruzUsl->bindValue(':pruzatelj', $pruzatelj);
    $statementPruzUsl->bindValue(':usluga', $usluga);

    $queryPruzUslKat = ("UPDATE pruzatelji_usluge_kategorije
    SET pruzatelj_usluga = :pruzatelj_usluga,
    kategorija = :kategorija
    WHERE idPruzUslKat = :idPruzUslKat ");
    $statementPruzUslKat = $db->prepare($queryPruzUslKat);
    $statementPruzUslKat->bindValue(':idPruzUslKat', $idPruzUslKat);
    $statementPruzUslKat->bindValue(':pruzatelj_usluga', $pruzateljUsluga);
    $statementPruzUslKat->bindValue(':kategorija', $kategorija);


    if ($statementPruzUsl -> execute() && $statementPruzUslKat -> execute()) {
        $countPruzUsl = $statementPruzUsl ->rowCount();
        $countPruzUslKat = $statementPruzUslKat ->rowCount();

    };
    $statementPruzUsl->closeCursor();
    $statementPruzUslKat->closeCursor();

    return $countPruzUsl && $countPruzUslKat;
};

function deletePruzatelj($idDeletePruz){
    global $db;
    $count = 0;
        $query = "DELETE p,pu,puk
        FROM pruzatelji p 
        INNER JOIN pruzatelji_usluge pu ON p.idPruz = pu.pruzatelj
        INNER JOIN pruzatelji_usluge_kategorije puk ON puk.pruzatelj_usluga = pu.idPruzUsl
        WHERE idPruz = :idPruz ";
        $statement = $db->prepare($query);
        $statement->bindValue(':idPruz', $idDeletePruz);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    };