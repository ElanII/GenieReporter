<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"CP Not Reviewd in 3 months"])
</head>
<body>
	@include('partials.sidebar')
<?php
	// Defining Genie connection parameters.
	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');

	// Connection to the server.
	$db = new PDO($dsn,$user,$pass);

	// Setting the filter Date.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-3 month'));


	// Looking for PT IDs for patients with Sale ItemNum within time frame.
	$sql0 = "SELECT PT_Id_Fk FROM Sale WHERE ItemNum IN ('721','723','732') AND ServiceDate >= :YearAgo";
	try {
		$stmt0 = $db->prepare($sql0);
		$stmt0->execute([':YearAgo'=> $YearAgo]);
	} catch (PDOException $e0) {
		echo "Problem with initial database query:".$e0;
	}
	$results_array0 = $stmt0->fetchAll();
	// Create an array of PT IDs who have the condition specified.
	foreach ($results_array0 as $value) {
		$PTID[] = $value['PT_ID_FK'];
	}
	//var_dump($PTID);
	
	// Looking for PT IDs for patients with Sale ItemNum within time frame.
	$sql2 = "SELECT PT_Id_Fk FROM Sale WHERE ItemNum = '732' AND ServiceDate >= :YearAgo";
	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute([':YearAgo'=> $YearAgo]);
	} catch (PDOException $e0) {
		echo "Problem with initial database query:".$e0;
	}
	$results_array2 = $stmt2->fetchAll();
	// Create an array of PT IDs who have the condition specified.
	foreach ($results_array2 as $value) {
		$PTID2[] = $value['PT_ID_FK'];
	}
	//var_dump($PTID);



	// The Primary Query. Will fetch results matching given criteria.
	$sql2 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Id IN (".implode(',', $PTID2).") AND Id NOT IN (".implode(',', $PTID).")";
	//echo $sql2;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql2);
		$stmt->execute();
	} catch (PDOException $e) {
		echo 'Database Error Second Query:'.$e;
	}
	$results_array = $stmt->fetchAll();

		// Printing the Content Table.
		echo '<div class="container container-fluid">';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading"><b>'.'Care Plans that have not been reviewed in the last 3months (732 without 721/723)'.'</b></div>';

?>
	@include('partials.tableS')
</body>
</html>