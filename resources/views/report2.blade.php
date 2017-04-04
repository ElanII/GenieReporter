<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Hypertension Pts Not Seen 12 months"])
</head>
<body>
	@include('partials.sidebar')
<?php
	// Defining Genie connection parameters.
	$dsn = '4D:host=10.10.10.26;port=19812;charset=UTF-8';
	$user = 'Back Office User';
	$pass = 'bianca';

	// Connection to the server.
	$db = new PDO($dsn,$user,$pass);

	// Setting the filter Date.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));


	// Looking for PT IDs for patients with Problem in CurrentProblem.
	$sql0 = "SELECT PT_Id_Fk FROM CurrentProblem WHERE LOWER (Problem) LIKE '%hypertension%' OR Problem LIKE '%Hypertension%'";
	try {
		$stmt0 = $db->prepare($sql0);
		$stmt0->execute();
	} catch (PDOException $e0) {
		echo "Problem with initial database query:".$e0;
	}
	$results_array0 = $stmt0->fetchAll();
	// Create an array of PT IDs who have the condition specified.
	foreach ($results_array0 as $value) {
		$PTID[] = $value['PT_ID_FK'];
	}
	//var_dump($PTID);
	//echo "(".implode(',', $PTID).")";




	// The Primary Query. Will fetch results matching given criteria.
	$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND LastSeenDate < :YearAgo AND Id IN (".implode(',', $PTID).")";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute([':YearAgo'=> $YearAgo]);
	} catch (PDOException $e) {
		echo 'Database Error Second Query:'.$e;
	}

$results_array = $stmt->fetchAll();
	echo '<div class="container-fluid">';
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading"><b>'.'All Hypertension Patients not seen in the past 12 months'.'</b></div>';

?>
	@include('partials.tableS')
</body>
</html>