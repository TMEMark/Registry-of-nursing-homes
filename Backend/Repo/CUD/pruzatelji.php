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

function updatePruzatelj($idPruz, $nazivPruzatelja,$oib, $email, $adresa, $kontakt, $URL, $radnVr, $napomena, $long, $lat, $lokacija){
    global $db;
    $count = 0;
    $query = ("UPDATE pruzatelji 
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
    lokacija = :lokacija,
    oib = :oib

    WHERE idPruz = :idPruz ");
    $statement = $db->prepare($query);
    $statement->bindValue(':idPruz', $idPruz);
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