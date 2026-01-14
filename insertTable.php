<?php

    function insertTable($host, $dbName, $tableName, $userName, $password, $id, $firstName, $lastName, $department, $salery, $hireDate, $status) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    	if(!is_numeric($gehalt)) {$gehalt=0;}
	    	if($eintrittsdatum == '') {$eintrittsdatum = date("Y-m-d");}

	    	$statement = $connection->prepare("INSERT INTO $tableName (ID, Vorname, Name, Abteilung, Gehalt, Eintrittsdatum, Status) VALUES ($id, \"$firstName\", \"$lastName\", \"$department\", $salery, \"$hireDate\", \"$status\")");
            $statement->execute();

        } catch(PDOException $error) {
            echo "InsertTable - Error: " . $error->getMessage();
        }
        $connection = null;
    }

?>

