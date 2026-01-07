<?php

    function CSVtoDB($host, $dbname, $tablename, $username, $password, $csvname) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $file = fopen($csvname, "r");
            while(! feof($file)) {
                $daten = fgetcsv($file);
                $id = $daten[0];
                $vorname = $daten[1];
                $name = $daten[2];
                $abteilung = $daten[3];
                $gehalt = $daten[4];
                $eintrittsdatum = $daten[5];
                $status = $daten[6];

                $statement = $connection->prepare("INSERT IGNORE INTO $tablename (ID, Vorname, Name, Abteilung, Gehalt, Eintrittsdatum, Status)
                VALUES ('$id', '$vorname', '$name', '$abteilung', '$gehalt', '$eintrittsdatum', '$status')");
                $statement->execute();
            }
            $sqlquery = "DELETE FROM $tablename WHERE ID = '' OR 0";
            $connection->exec($sqlquery);

            //echo "New records created successfully";
        } catch(PDOException $error) {
            echo "CSVtoDB - Error: " . $error->getMessage();
        }
        fclose($file);
        $connection = null;
    }

?>

