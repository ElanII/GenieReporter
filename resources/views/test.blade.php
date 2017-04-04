<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<title>Test</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

	$dsn = '4D:host=10.10.10.153;port=19812;charset=UTF-8';
	$user = 'Reception 3';
	$pass = 'rec3';

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);

	// Creating the SQL statement
	$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results_array = $stmt->fetchAll();
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading">'.'Patients with the Last Name Mouse'.'</div>';
		echo '<div class="panel-body">';
		echo '<table class="table table-striped">';
		echo '<thead>';
		// Table Headings
		echo '<tr>'.'<td>Surname</td>'.'<td>First Name</td>'.'<td>Date of birth</td>'.'<td>Chart No</td>'.'<td>Last Seen</td>'.'<td>Home Phone</td>'.'<td>Mobile Phone</td>'.'</tr>';
		echo '</thead>';
		echo '<tbody>';
	// Table Data Rows
	foreach ($results_array as $value) {
		// Getting rid of the time values in Dates.
		$DOB = substr($value['DOB'], 0,strrpos($value['DOB'], ' '));
		$LSD = substr($value['LASTSEENDATE'], 0,strrpos($value['LASTSEENDATE'], ' '));
		
		echo '<tr>';
		echo '<td>'.$value['SURNAME'].'</td>';
		echo '<td>'.$value['FIRSTNAME'].'</td>';
		echo '<td>'.$DOB.'</td>';
		echo '<td>'.$value['CHARTORNHS'].'</td>';
		echo '<td>'.$LSD.'</td>';
		echo '<td>'.$value['HOMEPHONE'].'</td>';
		echo '<td>'.$value['MOBILEPHONE'].'</td>';
		echo '</tr>';
	}
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
	$db = null;

?>
</body>
</html>