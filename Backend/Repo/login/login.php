<?php
function login($username, $password){
    global $db;
    $count = 0;
    $query = 
    ("SELECT * 
    FROM administratori
    WHERE korisnicko_ime = :username
    AND lozinka = :pw");
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':pw', $password);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();

    return $count;
};
