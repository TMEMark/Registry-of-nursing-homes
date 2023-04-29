<?php

namespace helper;

use PDO;

class IdGenerator
{
    function generateUniqueId($db, $table, $column) {
        // Generate a unique ID
        $id = abs(crc32(uniqid()));

        // Check if the ID already exists in the database
        $statement = $db->prepare("SELECT COUNT(*) FROM :table WHERE $column = :id");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':table', $table);
        $statement->execute();
        $count = $statement->fetchColumn();

        // If the ID exists, generate a new one
        while ($count > 0) {
            $id = abs(crc32(uniqid()).rand());
            $statement->bindValue(':id', $id);
            $statement->execute();
            $count = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $id;
    }

}