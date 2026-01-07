<?php

    function outTable($host, $dbname, $tablename, $username, $password, $filter) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlquery = "SELECT * FROM $tablename WHERE $filter";
            foreach ($connection->query($sqlquery) as $row) {
                echo "<tr>";
                for($i=0; $i<7; $i++) {
		    if($i == 5) {
			echo "<td>". date("d.m.Y",strtotime($row[$i])) ."</td>";
		    }
		    else {
			echo "<td>". $row[$i] ."</td>";
		    }
                }
                echo "<td>";
                echo "<form action=\"./editor.php\" method=\"POST\">";
                echo "<button type=\"submit\" value=\"$row[0]\" name=\"wertid\">Zeile bearbeiten</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } catch(PDOException $error) {
            echo "OutTable:" . $sqlquery . "<br>" . $error->getMessage();
        }
        $connection = null;
    }

?>


