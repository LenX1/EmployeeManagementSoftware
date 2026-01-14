
<!DOCTYPE html>

<html lang="de">

	<?php
	    require 'config.php';
	    require_once('makeDB.php');
	    require_once('makeTable.php');
	    require_once('CSV2DB.php');
	    require('outTable.php');
	
	
	    makeDB($host, $dbName, $userName, $password);
	    makeTable($host, $dbName, $tableName, $tableHeader, $userName, $password);
	    CSVtoDB($host, $dbName, $tableName, $userName, $password, $csvName);
	
	    if( isset($_POST['FilterStatus']) ) {
		$filter = $_POST['FilterStatus'];
	    }
	    elseif( isset($_POST['FilterGehaltVon']) && isset($_POST['FilterGehaltBis']) ) {
		$filter = "Gehalt BETWEEN ".$_POST['FilterGehaltVon']." AND ".$_POST['FilterGehaltBis'];
	    }
	    elseif( isset($_POST['FilterGehaltBis']) ) {
	        $filter = "Gehalt < ".$_POST['FilterGehaltBis'];
	    }
	    elseif( isset($_POST['FilterGehaltVon']) ) {
	        $filter = "Gehalt > ".$_POST['FilterGehaltVon'];
	    }
	    else {
		$filter = '1';
	    }
	
	?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mitarbeiter Daten</title>
		<link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Tabelle mit Mitarbeiter Daten</h1>
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
				<?php outTable($host, $dbName, $tableName, $userName, $password, $filter); ?>
            </tbody>
        </table>
		<br>
		<h3><u> Optionen für Filter </u></h3>
		<form method="POST">
		    <label> Gehalt von </label>
		    <input type="text" name="FilterGehaltVon" value="<?php echo isset($_POST['FilterGehaltVon']) ? $_POST['FilterGehaltVon'] : '0'; ?>" method="GET">
		    <label> bis </label>
		    <input type="text" name="FilterGehaltBis" value="<?php echo isset($_POST['FilterGehaltBis']) ? $_POST['FilterGehaltBis'] : '5000'; ?>" method="GET">
		    <button type="submit" onclick="location.reload()"> FILTERN </button>
		</form>
		<form method="POST">
		    <label> Gehalt ab </label>
		    <input type="text" name="FilterGehaltVon" value="<?php echo isset($_POST['FilterGehaltVon']) ? $_POST['FilterGehaltVon'] : '0'; ?>" method="GET">
	            <button type="submit" onclick="location.reload()"> FILTERN </button>
		</form>
        <form method="POST">
            <label> Gehalt bis </label>
            <input type="text" name="FilterGehaltBis" value="<?php echo isset($_POST['FilterGehaltBis']) ? $_POST['FilterGehaltBis'] : '5000'; ?>" method="GET">
            <button type="submit" onclick="location.reload()"> FILTERN </button>
        </form>
		<br>
		<form action="" method="POST">
	            <button type="submit" name="FilterStatus" value="Status = &quot;aktiv&quot;" onclick="location.reload()"> Status &quot;aktive&quot; filtern </button>
		</form>
		<form action="" method="POST">
            <button type="submit" name="FilterStatus" value="Status = &quot;inaktiv&quot;" onclick="location.reload()"> Status &quot;inaktive&quot; filtern </button>
        </form>
        <br>
        <form method="POST">
	    	<button action="index.php"> Filter zurücksetzen </button>
        </form>
		<br>
		<h3><u> Neuen Mitarbeiter </u></h3>
        <form action="newEntry.php" method="POST">
            <button type="submit"> Neuen Mitarbeiter hinzufügen </button>
        </form>
        <br>
    </body>
</html>

