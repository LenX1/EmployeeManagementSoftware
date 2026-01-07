<?php

    function makeDB($host, $dbname, $username, $password) {
        try {
            $connection = new PDO("mysql:host=$host", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlquery = "CREATE DATABASE IF NOT EXISTS $dbname";
            $connection->exec($sqlquery);
            //echo "Database created successfully<br>";
        } catch(PDOException $error) {
            echo "Make DB: " . $sqlquery . "<br>" . $error->getMessage();
        }
        $connection = null;
    }

?>
