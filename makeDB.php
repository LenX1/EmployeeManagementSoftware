<?php

    function makeDB($host, $dbName, $userName, $password) {
        try {
            $connection = new PDO("mysql:host=$host", $userName, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlquery = "CREATE DATABASE IF NOT EXISTS $dbName";
            $connection->exec($sqlquery);
            
        } catch(PDOException $error) {
            echo "Make DB: " . $sqlquery . "<br>" . $error->getMessage();
        }
        $connection = null;
    }

?>
