<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"DEXA 70+ Results"])
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


		

		// BHMC ITEM PRESENT (COMPLETE OR INCOMPLETE)
		$patientsHaveDexa = DB::connection('mysql')->select("SELECT DISTINCT patientID FROM bhmcSales WHERE ITEMNUM IN ('12323','12306','12312','12315','12321')");
		foreach ($patientsHaveDexa as $value) {
			$PTID3[] = $value->patientID;
		}


		
		$db = new PDO($dsn,$user,$pass);

		// BHGPSC ITEM COMPLETE.
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


		// The Primary Query. Will fetch results matching given criteria.
		$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Age >= 70 AND Id NOT IN (".implode(',', $PTID).") AND Id NOT IN (".implode(',', $PTID3).") AND Id IN (".implode(',', $PTID5).")";
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
	?>

	{{-- Table Section --}}
	@include('newpartials/saleTable',['title'=>"DEXA Has never had before but age is over 70"])
	{{-- @php
		var_dump($PTID3);
	@endphp --}}
	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>