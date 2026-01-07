<?php

    function deleteFromTable($host, $dbname, $tablename, $username, $password, $id) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $connection->prepare("DELETE FROM $tablename WHERE ID=$id");
            $statement->execute();

            //echo "Delete record successfully";
        } catch(PDOException $error) {
            echo "DeleteFromTable - Error: " . $error->getMessage();
        }
        $connection = null;
    }

?>


