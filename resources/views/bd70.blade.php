<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"70+ Never billed for DEXA"])
</head>
<body>
	@include('partials.sidebar')
<?php
	// Defining Genie connection parameters.

	// Connection to the server.
	$db = new PDO($dsn,$user,$pass);

	// Setting the filter Date.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-12 month'));


	// Looking for PT IDs for patients with Sale ItemNum within time frame.
	$sql0 = "SELECT DISTINCT PT_Id_Fk FROM Sale WHERE ItemNum IN ('12323','12306','12312','12315','12321')";
	try {
		$stmt0 = $db->prepare($sql0);

	} catch (PDOException $e0) {
		echo "Problem with initial database query:".$e0;
	}
	$PTID = array('0' => '0');
	$results_array0 = $stmt0->fetchAll();
	// Create an array of PT IDs who have the condition specified.
	foreach ($results_array0 as $value) {
		$PTID[] = $value['PT_ID_FK'];
	}
	

	// BHMC Sales checking.
	$bhmcDexa = DB::connection('mysql')->select("SELECT DISTINCT patientID FROM bhmcSales WHERE ITEMNUM IN ('12323','12306','12312','12315','12321')");
	foreach ($bhmcDexa as $value) {
		$PTID2[] = $value->patientID;
	}
	//var_dump($PTID);



	// The Primary Query. Will fetch results matching given criteria.
	$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Age >= 70 AND Id NOT IN (".implode(',', $PTID).") AND Id NOT IN (".implode(',', $PTID2).")";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute();
	} catch (PDOException $e) {
		echo 'Database Error Second Query:'.$e;
	}
	$db = null;
	$results_array = $stmt->fetchAll();

		// Printing the Content Table.
		echo '<div class="container-fluid">';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading"><b>'.'70+ Never billed for DEXA'.'</b></div>';

?>
	@include('partials.tableS')
</body>
</html>