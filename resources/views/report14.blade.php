<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"My Health Record"])
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


		$sql0 = "SELECT DISTINCT PT_Id_Fk FROM HIAudit WHERE IHIStatusNew = 'Active' AND HIWSOperation = 'searchIHI'";
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
	@include('newpartials/table',['title'=>"Patients registered with My Health Record"])

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>