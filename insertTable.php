<?php

    function insertTable($host, $dbname, $tablename, $username, $password, $id, $vorname, $name, $abteilung, $gehalt, $eintrittsdatum, $status) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    if(!is_numeric($gehalt)) {$gehalt=0;}
	    if($eintrittsdatum == '') {$eintrittsdatum = date("Y-m-d");}

	    $statement = $connection->prepare("INSERT INTO $tablename (ID, Vorname, Name, Abteilung, Gehalt, Eintrittsdatum, Status) VALUES ($id, \"$vorname\", \"$name\", \"$abteilung\", $gehalt, \"$eintrittsdatum\", \"$status\")");
            $statement->execute();

            //echo "New records created successfully";
        } catch(PDOException $error) {
            echo "InsertTable - Error: " . $error->getMessage();
        }
        $connection = null;
    }

?>



