<?php


function insertKategorije($nazivKat){
    global $db;
    $count = 0;
    $query = "INSERT INTO kategorije (naziv_kategorije) VALUES (:nazivKat)";
    $statement = $db->prepare($query);
    $statement->bindValue(':nazivKat', $nazivKat);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();

    return $count;
};

function updateKategorije($idKat,$nazivKat){
    global $db;
    $count = 0;
    $query = ("UPDATE kategorije 
    SET naziv_kategorije = :nazivKat
    WHERE idKategorija = :idKat ");
    $statement = $db->prepare($query);
    $statement->bindValue(':nazivKat', $nazivKat);
    $statement->bindValue(':idKat', $idKat);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
};

function deleteKategorije($idDeleteKat){
    global $db;
    $count = 0;
    $query = "DELETE FROM kategorije 
            WHERE idKategorija = :idKat ";
    $statement = $db->prepare($query);
    $statement->bindValue(':idKat', $idDeleteKat);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
};

