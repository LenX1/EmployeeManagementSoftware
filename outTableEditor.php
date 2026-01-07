<?php

    function outTableEditor($host, $dbname, $tablename, $username, $password, $idrow) {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlquery = "SELECT * FROM $tablename WHERE ID = $idrow";

            foreach($connection->query($sqlquery) as $row);
                echo "<tr>";
                echo "<form method=\"post\">";
                for($i=0; $i<7; $i++) {
		    if($i == 0) {
			echo "<td>". "<input type=\"number\" value=\"$row[$i]\" name=\"$i\">"  ."</td>";
		    }
		    elseif($i == 1 OR $i == 2) {
			echo "<td>". "<input type=\"text\" value=\"$row[$i]\" name=\"$i\" required>". "</td>";
		    }
		    elseif($i == 3) {
			//echo "<td>". "<input type=\"text\" value=\"$row[$i]\" name=\"$i\">". "</td>";
			$liste = array("", "IT", "Marketing", "HR");
			echo "<td>". "<select name=\"$i\">";
			    foreach($liste as $l) {
				if($l == $row[$i]) {
				    echo "<option value=\"$l\" selected> $l </option> ";
				}
				else {
				    echo "<option value=\"$l\"> $l </option> ";
				}
			    }
			echo "</select>". "</td>";
		    }
		    elseif($i == 4) {
			echo "<td>". "<input type=\"number\" value=\"$row[$i]\" name=\"$i\" min=\"0\">". "</td>";
		    }
		    elseif($i == 5) {
			echo "<td>". "<input type=\"date\" value=\"$row[$i]\" name=\"$i\" >". "</td>";
		    }
		    else {
			echo "<td>". "<input type=\"text\" value=\"$row[$i]\" name=\"$i\">". "</td>";
                    }
		}
                echo "<td>". "<button type=\"submit\" name=\"wert\"> Updaten und Zurück </button>". "</td>";
                echo "</form";
                echo "</tr>";

        } catch(PDOException $error) {
            echo "OutTable:" . $sqlquery . "<br>" . $error->getMessage();
        }
        $connection = null;
    }

?>


