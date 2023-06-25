<?php

namespace helper;

use PDO;

class IdGenerator
{
    function generateUniqueId($db, $table, $column) {
        // Generate a unique ID
        $id = abs(crc32(uniqid()));

        // Check if the ID already exists in the database
        $statement = $db->prepare("SELECT COUNT(*) FROM $table WHERE $column = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $count = $statement->fetchColumn();

        // If the ID exists, generate a new one
        while ($count > 0 || $id == 2147483647) {
            $id = abs(crc32(uniqid()) . rand());
            $statement = $db->prepare("SELECT COUNT(*) FROM $table WHERE $column = :id");
            $statement->bindValue(':id', $id);
            $statement->execute();
            $count = $statement->fetchColumn();
        }

        return $id;
    }

}