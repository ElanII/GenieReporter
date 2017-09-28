<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Hypertension No ECG"])
</head>
<body>
	@include('partials.sidebar')
<?php
	// Defining Genie connection parameters.

	// Connection to the server.
	$db = new PDO($dsn,$user,$pass);

	// Setting the filter Date.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-24 month'));


	// Looking for PT IDs for patients with Sale ItemNum within time frame.
	$sql0 = "SELECT PT_Id_Fk FROM Sale WHERE ItemNum='11700' AND ServiceDate >= :YearAgo";
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
	
	// Looking for PT IDs for Patients with the specified Problem.
	$sql1 = "SELECT PT_Id_Fk FROM CurrentProblem WHERE LOWER (Problem) LIKE '%hypertension%'";
	try {
		$stmt2 = $db->prepare($sql1);
		$stmt2->execute();
	} catch (PDOException $e0) {
		echo "Problem with CurrentProblem Table query:".$e0;
	}
	$results_array2 = $stmt2->fetchAll();
	// Create an array of PT IDs who have the condition specified.
	foreach ($results_array2 as $value) {
		$PTID2[] = $value['PT_ID_FK'];
	}
	//var_dump($PTID2);



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
	$db = null;
	$results_array = $stmt->fetchAll();

		// Printing the Content Table.
		echo '<div class="container-fluid">';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading"><b>'.'Chronic Condition with No Care Plan in the last 12months (Hypertension but no ECG)'.'</b></div>';

?>
	@include('partials.tableS')
</body>
</html>