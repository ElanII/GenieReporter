<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"Diabetic patients with an appointment today"])
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	{{-- PHP Section for Query --}}
	<?php
		// Defining Genie connection parameters.

		// Connection to the server.
		$db = new PDO($dsn,$user,$pass);

		// Setting the filter Date.
		$YearAgo = date("Y-m-d H:i:s",strtotime('-12 month'));
		$today = date("Y-m-d");


		$sql0 = "SELECT DISTINCT PT_Id_Fk AS ID FROM Appt WHERE StartDate = :today";
		try {
			$stmt0 = $db->prepare($sql0);
			$stmt0->execute([':today'=> $today]);
		} catch (PDOException $e0) {
			echo "Problem with initial database query:".$e0;
		}
		$results_array0 = $stmt0->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array0 as $value) {
			$PTID0[] = $value['ID'];
		}


		
		$sql3 = "SELECT DISTINCT PT_Id_Fk AS ID FROM CurrentProblem WHERE Problem LIKE '%diabetes%'";
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

		$PTID = array_uintersect($PTID0, $PTID3,'compareDeepValue');

		
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE
		 Id IN (".implode(',', $PTID).")";
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
	@include('newpartials/table',['title'=>"Diabetic patients with an appointment today"])

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>