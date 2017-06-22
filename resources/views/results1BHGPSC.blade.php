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

		$sql3 = "SELECT DISTINCT PT_Id_Fk AS ID FROM HIAudit WHERE IHIStatusNew = 'Active' AND HIWSOperation = 'searchIHI'";
		try {
			$stmt3 = $db->prepare($sql3);
			$stmt3->execute();
		} catch (PDOException $e3) {
			echo "Problem with initial database query:".$e3;
		}
		$results_array3 = $stmt3->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array3 as $value) {
			$PTID3[] = $value['ID'];
		}

		// Comparison
		function compareDeepValue($val1,$val2){
			return strcmp($val1, $val2);
		}

		//$PTID = array_diff($PTID0, $PTID3);

		
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE
		 Id IN (".implode(',', $PTID0).") AND Id IN (".implode(',', $PTID3).")";
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
	@include('newpartials/table',['title'=>"Search Results for patients with MyHR..."])
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