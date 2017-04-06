<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"45 to 49 Year Olds without CP in the last 12 months"])
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
		$YearAgo = date("Y-m-d H:i:s",strtotime('-12 month'));


		$sql0 = "SELECT DISTINCT PT_Id_Fk FROM Sale WHERE ItemNum IN ('721','732','723') AND ServiceDate >= :YearAgo";
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


		
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Age >= 45 AND Age <= 49 AND Id NOT IN (".implode(',', $PTID).")";
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
	@include('newpartials/table',['title'=>"45 to 49 Year Olds without CP in the last 12 months"])

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>