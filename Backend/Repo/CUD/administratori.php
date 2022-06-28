<?php

function insertAdministrator ($ime, $prezime, $username, $role ,$lozinka) {
    global $db;
    $count = 0;
    $query = 
    "INSERT INTO administratori (ime_admina, prezime_admina, korisnicko_ime, lozinka, uloga) 
    VALUES (:ime, :prezime, :username, :lozinka, :uloga)";
    $statement = $db->prepare($query);
    $statement->bindValue(':ime', $ime);
    $statement->bindValue(':prezime', $prezime);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':lozinka', $lozinka);
    $statement->bindValue(':uloga', $role);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();

    return $count;
};

function updateAdministrator ($idAdmin, $ime, $prezime, $username, $role, $lozinka){
    global $db;
    $count = 0;
    $query = ("UPDATE administratori SET 
    ime_admina = :ime,
    prezime_admina = :prezime,
    korisnicko_ime = :username, 
    lozinka = :lozinka,
    uloga = :uloga 
    WHERE idAdmin = :idAdmin ");
    $statement = $db->prepare($query);
    $statement->bindValue(':idAdmin', $idAdmin);
    $statement->bindValue(':ime', $ime);
    $statement->bindValue(':prezime', $prezime);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':lozinka', $lozinka);
    $statement->bindValue(':uloga', $role);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
};

function deleteAdministrator($idDeleteAdmin){
    global $db;
    $count = 0;
        $query = "DELETE FROM administratori 
                WHERE idAdmin = :idAdmin ";
        $statement = $db->prepare($query);
        $statement->bindValue(':idAdmin', $idDeleteAdmin);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
};        