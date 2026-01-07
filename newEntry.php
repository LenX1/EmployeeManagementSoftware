
<!DOCTYPE html>

<html lang="de">

<?php
    require 'config.php';
    require('insertTable.php');


    if(isset($_POST['wert'])) {
        insertTable($host, $dbname, $tablename, $username, $password, $_POST[0], $_POST[1], $_POST[2], $_POST[3], $_POST[4], $_POST[5], $_POST[6]);
        header("Location: ./index.php");
    }
    if(isset($_POST['abbruch'])) {
        header("Location: ./index.php");
    }


?>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MA erstellen</title>
        <link rel="stylesheet" href="stylew.css">
    </head>
    <body>
        <h1>Neuen Mitarbeiter erstellen</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vorname</th>
                    <th>Name</th>
                    <th>Abteilung</th>
                    <th>Gehalt</th>
                    <th>Eintrittsdatum</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
		<tr>
		    <form method="post">
		    	<td> <input type="number" name="0" placeholder="ID" required> </td>
		    	<td> <input type="text" name="1" placeholder="Vorname" required> </td>
		    	<td> <input type="text" name="2" placeholder="Name" required> </td>
<!--
		    	<td> <input type="text" name="3" placeholder="Abteilung"> </td>
-->
			<td> <select name="3">
                        <?php
			$liste = array("", "IT", "Marketing", "HR");
                        foreach($liste as $l) {
                            echo "<option> $l </option> ";
                        }
			?>
                        </select> </td>
		    	<td> <input type="number" name="4" min="0" placeholder="Gehalt"> </td>
		    	<td> <input type="date" name="5"> </td>
		    	<td> <input type="text" name="6" placeholder="Status"> </td>
		    	<td> <button type="submit" name="wert"> Updaten und Zurück </button> </td>
		    <form>
		</tr>
            </tbody>
        </table>
        <br>
        <button type="submit" name="abbruch" formnovalidate> Abbruch </button>
    </body>
</html>



