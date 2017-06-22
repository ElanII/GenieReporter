<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Mouse Test"])
</head>
<body>
	@include('partials.sidebar')
@php

	// Connection to the server
	
	// Defining Genie connection parameters.
	$db = new PDO($dsn,$user,$pass);

	// Creating the SQL statement
	// 50 Year olds who have not been seen in the past 12 months.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
	$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Surname = 'Mouse'";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$db = null;

$results_array = $stmt->fetchAll();
	echo '<div class="container-fluid">';
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading"><b>'.'Patients with the Surname MOUSE'.'</b></div>';

@endphp
	@include('partials.tableS')
</body>
</html>