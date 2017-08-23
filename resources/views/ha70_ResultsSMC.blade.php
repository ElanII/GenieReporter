<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"Search Results..."])
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	{{-- PHP Section for Query --}}
	<?php
		// Defining Genie connection parameters.
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');

		// Connection to the server.
		$db = new PDO($dsn,$user,$pass);

		// Setting the filter Date.
		date_default_timezone_set('Australia/Darwin');
		$YearAgo = date("Y-m-d H:i:s",strtotime('-12 month'));
		$today = date("Y-m-d");

		// Parameters from $_POST
		$providerName = $_POST['providerName'];
		if ($providerName=='?') {
			$providerName = '%';
		}
		$fromDate = $_POST['fromDate'];
		$toDate = $_POST['toDate'];


		$sql0 = "SELECT DISTINCT PT_Id_Fk AS ID FROM Appt WHERE StartDate <= :toDate AND StartDate >= :fromDate AND ProviderName LIKE :providerName";
		try {
			$stmt0 = $db->prepare($sql0);
			$stmt0->execute([':toDate'=> $toDate, ':fromDate'=> $fromDate, ':providerName'=> $providerName]);
		} catch (PDOException $e0) {
			echo "Problem with initial database query:".$e0;
		}
		$results_array0 = $stmt0->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array0 as $value) {
			$PTID0[] = $value['ID'];
		}
		if (count($results_array0)===0) {
			$PTID0 = [0];
		}

		// Looking for PT IDs for patients with Sale ItemNum within time frame.
		$sql3 = "SELECT PT_Id_Fk FROM Sale WHERE ItemNum IN ('701','703','705','707','715') AND ServiceDate >= :YearAgo";
		try {
			$stmt3 = $db->prepare($sql3);
			$stmt3->execute([':YearAgo'=> $YearAgo]);
		} catch (PDOException $e3) {
			echo "Problem with initial database query:".$e3;
		}
		$results_array3 = $stmt3->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array3 as $value) {
			$PTID3[] = $value['PT_ID_FK'];
		}

		
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Age >= 75 AND
		 Id IN (".implode(',', $PTID0).") AND Id NOT IN (".implode(',', $PTID3).")";
		try {
			$stmt = $db->prepare($sql1);
			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Database Error Second Query:'.$e;
		}

		

		$results_array = $stmt->fetchAll();
		$db = null;
	?>

	{{-- Table Section --}}
	@include('newpartials/table',['title'=>"Search Results for patients with Appointments..."])
	<?php 
	// echo '<pre>' . var_export($PTID0, true) . '</pre>';
	// echo '<pre>' . var_export($PTID3, true) . '</pre>';
	// echo '<pre>' . var_export($PTID, true) . '</pre>';
	// echo '<pre>' . var_export($_POST, true) . '</pre>';
	 ?>

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>