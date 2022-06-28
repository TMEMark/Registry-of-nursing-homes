<?php

function insertPU($pruzatelj, $usluga){
    global $db;
    $count = 0;

    $query = "INSERT INTO pruzatelji_usluge (pruzatelj, usluga) VALUES (:pruzatelj, :usluga)";
    $statement = $db->prepare($query);
    $statement->bindValue(":pruzatelj", $pruzatelj);
    $statement->bindValue(":usluga", $usluga);

    if ($statement -> execute()) {
        $count = $statement ->rowCount();
    };
    $statement->closeCursor();

    return $count;
}
