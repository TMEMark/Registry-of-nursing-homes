<?php
function login($username){
    global $db;
    $query = 
    ("SELECT * 
    FROM administratori
    WHERE korisnicko_ime = :username");
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    return $statement->fetch();
};
