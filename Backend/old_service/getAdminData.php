<?php

function chechIfUserExists(mysqli $conn,$idAdmin){
    global $db;
    $query = 'SELECT admin 
    FROM administratori 
    WHERE idAdmin = :idAdmin;';
    $statement = $db->prepare($query);
    $statement->bindValue(':idAdmin', $idAdmin);
    $statement->execute();
    return $conn->query($query);
}

