
<!DOCTYPE html>

<html lang="de">

<?php
    require 'config.php';
    require('outTableEditor.php');
    require('writeTable.php');


    $idrow =  $_POST['wertid'];

    if(isset($_POST['wert'])) {
	writeTable($host, $dbname, $tablename, $username, $password, $_POST[0], $_POST[1], $_POST[2], $_POST[3], $_POST[4], $_POST[5], $_POST[6]);
	header("Location: ./index.php");
    }
    if(isset($_POST['abbruch'])) {
        header("Location: ./index.php");
    }


?>



    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MA Daten bearbeiten</title>
	<link rel="stylesheet" href="stylew.css">
    </head>
    <body>
        <h1>Mitarbeiter Daten bearbeiten</h1>
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
		<?php outTableEditor($host, $dbname, $tablename, $username, $password, $idrow); ?>
            </tbody>
        </table>
	<br>
	<button type="submit" name="abbruch" formnovalidate> Abbruch </button>
    </body>
</html>

