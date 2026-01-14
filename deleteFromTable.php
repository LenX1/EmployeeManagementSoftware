<?php

    function deleteFromTable($host, $dbName, $tableName, $userName, $password, $id) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $connection->prepare("DELETE FROM $tableName WHERE ID=$id");
            $statement->execute();

        } catch(PDOException $error) {
            echo "DeleteFromTable - Error: " . $error->getMessage();
        }
        $connection = null;
    }

?>


