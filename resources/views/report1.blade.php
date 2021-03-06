<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"50 YO Not Seen in 12 months"])
</head>
<body>
	@include('partials.sidebar')
<?php

	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);

	// Creating the SQL statement
	// 50 Year olds who have not been seen in the past 12 months.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
	$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Age>=50 AND Postcode LIKE '%2880%' AND LastSeenDate <= :YearAgo";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute([':YearAgo'=> $YearAgo]);
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$db = null;

$results_array = $stmt->fetchAll();
	echo '<div class="container-fluid">';
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading"><b>'.'50 Year Olds who have not been seen in the past 12 months'.'</b></div>';

?>
	@include('partials.tableS')
</body>
</html>