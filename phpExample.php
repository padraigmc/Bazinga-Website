<html>
<head>
	<style>
	
		table {border-collapse:collapse;}
		table, tr, th, td {padding: 5px; text-align: center;}
		table, th, td {border: 1px solid black;}
	
	</style>
	
	<title>My First PHP Page</title>
</head>
<body style="background-color: #ccffdd; color: blue;">
<?php
if (isset($_GET["cNum"])) {
	$dbName = "phonesRUS";
	$host = "localhost";
	$username = "root";
	$password = "";
	$cID = $_GET["cNum"];
	
	$conn = new mysqli($host, $username, $password, $dbName);
	
	if($conn->connect_errno > 0) {
		die("Unable to locate DBMS and/or DB.");
	}
	
	$sql = "SELECT a.contractNo, a.customerno, a.modelno, a.phoneno, a.startdate, a.enddate, a.contracttypeno, c.name, ct.description
			FROM agreements AS a
			INNER JOIN customer AS c
				ON a.customerno=c.customerno
			INNER JOIN contracttype AS ct
				ON a.contracttypeno=ct.contracttypeno
			WHERE a.customerno = $cID;";
			
	if(!$result = $conn->query($sql)) {
		die("There was an error running your SQL command.");
	}
	
	echo "<table id=\"t1\"><tr><th>Name</th><th>Contract #</th><th>Model</th><th>Phone</th><th>Start Date</th><th>End Date</th><th>Contract Type</th></tr>";

	while($row = $result->fetch_assoc()) {
		$name = $row["name"];
		$contractNo = $row["contractNo"];
		$model = $row["modelno"];
		$phoneNo = $row["phoneno"];
		$start = $row["startdate"];
		$start = date_format(date_create($start), "d/m/Y");
		$end = $row["enddate"];
		$end = date_format(date_create($end), "d/m/Y");
		$contractType = $row["description"];
		
		echo "<tr><td>$name</td><td>$contractNo</td><td>$model</td><td>$phoneNo</td><td>$start</td><td>$end</td><td>$contractType</td></tr>";
	}
	echo "</table>";
	echo $result->num_rows." rows returned .. <br />";
	
	$result->free();
	$conn->close();
} else {
?>
<form method="GET" action="index 3.php">
<select id="cNum" name="cNum" tabindex="1">
	<option value=""></option>
	
	<?php
		$dbName = "phonesRUS";
		$host = "localhost";
		$username = "root";
		$password = "";
		$cID = $_GET["cNum"];

		$conn = new mysqli($host, $username, $password, $dbName);

		if($conn->connect_errno > 0) {
			die("Unable to locate DBMS and/or DB.");
		}

		$sql = "SELECT customerno, name FROM customer ORDER BY customerno;";

		if(!$result = $conn->query($sql)) {
			die("There was an error running your SQL command.");
		}
		
		while($row = $result->fetch_assoc()) {
			$number = $row["customerno"];
			$text = $row["name"];
			
			echo "<option value=\"$number\">$text</option>";
		}
				
		$result->free();
		$conn->close();
	?>

</select>
<input type="submit" tabindex="2" />
</form>
<?php
}
?>
</body>
</html>
