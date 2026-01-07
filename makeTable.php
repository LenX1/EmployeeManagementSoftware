<?php

    function makeTable($host, $dbname, $tablename, $tableheader, $username ,$password) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlquery = "CREATE TABLE IF NOT EXISTS $tablename($tableheader)";
            $connection->exec($sqlquery);
            //echo "Table created successfully<br>";
        } catch(PDOException $error) {
            echo "Make Table: " . $sqlquery . "<br>" . $error->getMessage();
        }
        $connection = null;
    }

?>

