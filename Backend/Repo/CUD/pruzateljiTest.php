<?php

function insertPruzatelj($nazivPruzatelja, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $lokacija, $oib){
    global $db;
    $count = 0;
    $query = 
    "INSERT INTO 
    pruzatelji (naziv_pruzatelja, email, adresa, kontakt, URL_stranice, radno_vrijeme, napomena, longitude, latitude, lokacija, oib) 
    VALUES 
    (:nazivPruzatelja, :email, :adresa, :kontakt, :stranica, :radnVr, :napomena, :long, :lat, :lokacija, :oib)";
    $statement = $db->prepare($query);
    $statement->bindValue(':nazivPruzatelja', $nazivPruzatelja);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':adresa', $adresa);
    $statement->bindValue(':kontakt', $kontakt);
    $statement->bindValue(':stranica', $URL);
    $statement->bindValue(':radnVr', $radnVr);
    $statement->bindValue(':napomena', $napomena);
    $statement->bindValue(':long', $long);
    $statement->bindValue(':lat', $lat);
    $statement->bindValue(':lokacija', $lokacija);
    $statement->bindValue(':oib', $oib);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();

    return $count;
};


function updatePruzatelj($idPruz, $nazivPruzatelja, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $idPruzUsl, $lokacija, $pruzatelj, $usluga, $idPruzUslKat, $pruzateljUsluga, $kategorija){
    global $db;
    $countPruz = 0;
    $countPruzUsl = 0;
    $countPruzUslKat = 0;
    $queryPruzatelji = ("UPDATE pruzatelji 
    SET idPruz = :idPruz,
    naziv_pruzatelja = :nazivPruzatelja,
    email = :email,
    adresa = :adresa,
    kontakt = :kontakt,
    URL_stranice = :stranica,
    radno_vrijeme = :radnVr,
    napomena = :napomena,
    longitude = :long,
    latitude = :lat,
    lokacija = :lokacija
    WHERE idPruz = :idPruz ");
    $statementPruzatelj = $db->prepare($queryPruzatelji);
    $statementPruzatelj->bindValue(':idPruz', $idPruz);
    $statementPruzatelj ->bindValue(':nazivPruzatelja', $nazivPruzatelja);
    $statementPruzatelj ->bindValue(':email', $email);
    $statementPruzatelj ->bindValue(':adresa', $adresa);
    $statementPruzatelj ->bindValue(':kontakt', $kontakt);
    $statementPruzatelj ->bindValue(':stranica', $URL);
    $statementPruzatelj ->bindValue(':radnVr', $radnVr);
    $statementPruzatelj ->bindValue(':napomena', $napomena);
    $statementPruzatelj ->bindValue(':long', $long);
    $statementPruzatelj ->bindValue(':lat', $lat);
    $statementPruzatelj ->bindValue(':lokacija', $lokacija);

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


    if ($statementPruzatelj ->execute() && $statementPruzUsl -> execute() && $statementPruzUslKat -> execute()) {
        $countPruz = $statementPruzatelj ->rowCount();
        $countPruzUsl = $statementPruzUsl ->rowCount();
        $countPruzUslKat = $statementPruzUslKat ->rowCount();

    };
    $statementPruzatelj->closeCursor();
    $statementPruzUsl->closeCursor();
    $statementPruzUslKat->closeCursor();

    return $countPruz && $countPruzUsl && $countPruzUslKat;
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