<?php

    function writeTable($host, $dbname, $tablename, $username, $password, $id, $vorname, $name, $abteilung, $gehalt, $eintrittsdatum, $status) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $statement = $connection->prepare("UPDATE $tablename SET Vorname=\"$vorname\", Name=\"$name\", Abteilung=\"$abteilung\", Gehalt=\"$gehalt\", Eintrittsdatum=\"$eintrittsdatum\", Status=\"$status\" WHERE ID=$id");
            $statement->execute();

            //echo "New records created successfully";
        } catch(PDOException $error) {
            echo "WriteTable - Error: " . $error->getMessage();
        }
        $connection = null;
    }

?>


