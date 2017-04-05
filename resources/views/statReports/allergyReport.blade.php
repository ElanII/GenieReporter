<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"Patients with No form of Allergy information (IN TOWN)"])
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	

	{{-- PHP Section for Query --}}
	<?php
		// Defining Genie connection parameters.
		$dsn = '4D:host=10.10.10.26;port=19812;charset=UTF-8';
		$user = 'Back Office User';
		$pass = 'bianca';

		// Connection to the server.
		$db = new PDO($dsn,$user,$pass);

		// Setting the filter Date.
		$YearAgo = date("Y-m-d H:i:s",strtotime('-12 month'));


		$sql0 = "SELECT DISTINCT PT_Id_Fk FROM Allergy WHERE Allergy <> ''";
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


		
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Id NOT IN (".implode(',', $PTID).")";
		try {
			$stmt = $db->prepare($sql1);
			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Database Error Second Query:'.$e;
		}

		

		$results_array = $stmt->fetchAll();
	?>


	{{-- Table Section --}}
	@include('newpartials/table',['title'=>"Patients with No form of Allergy information (IN TOWN)"])


	{{-- Buttons --}}
	<div class="well-sm">
		<ul>
			<button class="btn-info" onclick="location.href='/allergy';">Back to Stats</button>
		</ul>
	</div>


	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>