<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"Smokers without CP"])
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	{{-- PHP Section for Query --}}
	<?php

		// Connection to the server.
		$db = new PDO($dsn,$user,$pass);

		// Setting the filter Date.
		date_default_timezone_set('Australia/Darwin');
		$YearAgo = date("Y-m-d H:i:s",strtotime('-3 month'));
		$today = date("Y-m-d");

		

		

		

		// Sale exists
		$sql2 = "SELECT DISTINCT PT_Id_Fk AS ID FROM Sale WHERE ItemNum IN ('721','723','732')";
		try {
			$stmt2 = $db->prepare($sql2);
			$stmt2->execute();
		} catch (PDOException $e2) {
			echo "Problem with initial database query:".$e2;
		}
		$results_array2 = $stmt2->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array2 as $value) {
			$PTID2[] = $value['ID'];
		}
		// echo '<pre>' . var_export($PTID2, true) . '</pre>';
		// var_dump($PTID2);

		

		// Patient
		$sql1 = "SELECT DISTINCT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE
		 Id NOT IN (".implode(',', $PTID2).") AND Age > 20 AND Age < 55 AND SmokingFreq IN (1,3,2) AND Postcode LIKE '2880'";
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
	@include('newpartials/table',['title'=>"Search Results for smokers needing Care Plans"])
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