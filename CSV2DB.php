<?php

    function CSVtoDB($host, $dbName, $tableName, $userName, $password, $csvName) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $file = fopen($csvName, "r");
            while(! feof($file)) {
                $data = fgetcsv($file);
                $id = $data[0];
                $firstName = $data[1];
                $lastName = $data[2];
                $department = $data[3];
                $salery = $data[4];
                $hireDate = $data[5];
                $status = $data[6];

                $statement = $connection->prepare("INSERT IGNORE INTO $tableName (ID, Vorname, Name, Abteilung, Gehalt, Eintrittsdatum, Status)
                VALUES ('$id', '$firstName', '$lastName', '$department', '$salery', '$hireDate', '$status')");
                $statement->execute();
            }
            $sqlquery = "DELETE FROM $tableName WHERE ID = '' OR 0";
            $connection->exec($sqlquery);

        } catch(PDOException $error) {
            echo "CSVtoDB - Error: " . $error->getMessage();
        }
        fclose($file);
        $connection = null;
    }

?>

