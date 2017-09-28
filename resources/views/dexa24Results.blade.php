<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"DEXA 24"])
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	{{-- PHP Section for Query --}}
	<?php
		// Defining Genie connection parameters.

		

		// Setting the filter Date.
	    date_default_timezone_set('Australia/Darwin');
		$yearsAgo = date("Y-m-d H:i:s",strtotime('-24 month'));
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');


		// BHMC ITEM COMPLETE.
		$patientsHaveDexa = DB::connection('mysql')->select("SELECT DISTINCT patientID FROM bhmcSales WHERE ITEMNUM IN ('12323','12306','12315') AND SERVICEDATE >= :yearsAgo",
			['yearsAgo'=>$yearsAgo]);
		foreach ($patientsHaveDexa as $value) {
			$PTID[] = $value->patientID;
		}

		// BHMC ITEM PRESENT (COMPLETE OR INCOMPLETE)
		$patientsHaveDexa = DB::connection('mysql')->select("SELECT DISTINCT patientID FROM bhmcSales WHERE ITEMNUM IN ('12323','12306','12315')");
		foreach ($patientsHaveDexa as $value) {
			$PTID3[] = $value->patientID;
		}


		
		$db = new PDO($dsn,$user,$pass);

		// BHGPSC ITEM COMPLETE.
		$sql0 = "SELECT DISTINCT PT_Id_Fk FROM Sale WHERE ItemNum IN ('12323','12306','12315') AND ServiceDate >= :yearsAgo";
		try {
			$stmt0 = $db->prepare($sql0);
			$stmt0->execute([':yearsAgo'=> $yearsAgo]);
		} catch (PDOException $e0) {
			echo "Problem with second database query:".$e0;
		}
		$results_array0 = $stmt0->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array0 as $value) {
			$PTID2[] = $value['PT_ID_FK'];
		}

		// BHGPSC ITEM PRESENT (COMPLETE OR INCOMPLETE).
		$sql4 = "SELECT DISTINCT PT_Id_Fk FROM Sale WHERE ItemNum IN ('12323','12306','12315')";
		try {
			$stmt4 = $db->prepare($sql4);
			$stmt4->execute();
		} catch (PDOException $e4) {
			echo "Problem with second database query:".$e4;
		}
		$results_array4 = $stmt4->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array4 as $value) {
			$PTID4[] = $value['PT_ID_FK'];
		}

		$fromDate = $_POST['fromDate'];
		$toDate = $_POST['toDate'];
		$sql5 = "SELECT DISTINCT PT_Id_Fk AS ID FROM Appt WHERE StartDate <= :toDate AND StartDate >= :fromDate";
		try {
			$stmt5 = $db->prepare($sql5);
			$stmt5->execute([':toDate'=> $toDate, ':fromDate'=> $fromDate]);
		} catch (PDOException $e5) {
			echo "Problem with initial database query:".$e5;
		}
		$results_array5 = $stmt5->fetchAll();
		// Create an array of PT IDs who have the condition specified.
		foreach ($results_array5 as $value) {
			$PTID5[] = $value['ID'];
		}
		if (count($results_array5)===0) {
			$PTID5 = [0];
		}


		// Looking for patient information.
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE 
		(Id NOT IN (".implode(',', $PTID).") AND Id NOT IN (".implode(',', $PTID2).")) AND 
		(Id IN (".implode(',', $PTID3).") OR Id IN (".implode(',', $PTID4).")) AND (Id IN (".implode(',', $PTID5)."))";
		try {
			$stmt = $db->prepare($sql1);
			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Database Error Second Query:'.$e;
		}

		

		$results_array = $stmt->fetchAll();
		$db=null;
	?>

	{{-- Table Section --}}
	@include('newpartials/saleTable',['title'=>"DEXA 24 ( '12323' , '12306' , '12315' ) Has had before but not done in 24 months. May have had ( '12312' , '12321' ) done since, but doesn't count."])
	{{-- @php
		var_dump($PTID3);
	@endphp --}}
	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>