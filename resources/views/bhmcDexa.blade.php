<!DOCTYPE html>
<html>
<head>
	<title>DEXA24</title>
</head>
<body>
@php
	// Setting the filter Date.
    date_default_timezone_set('Australia/Darwin');
	$yearsAgo = date("Y-m-d H:i:s",strtotime('-24 month'));

	// Grabbing the relevant patients from BHMC db stored on the GR Server.
	$patientsHaveDexa = DB::connection('mysql')->select("SELECT dexaID, FIRSTNAME, SURNAME FROM bhmcSales WHERE ITEMNUM IN ('12323','12306','12315')");

	// Connection to the BHGPSC Genie server.
	$db = new PDO($dsn,$user,$pass);

	// Looking up PTID for BHMC patients.
	// foreach ($patientsHaveDexa as $value) {
	// 	$sql1 = "SELECT Id FROM Patient WHERE FirstName LIKE :FirstName AND Surname LIKE :Surname";
	// 	try {
	// 		$stmt = $db->prepare($sql1);
	// 		$stmt->execute(['FirstName'=>$value->FIRSTNAME, 'Surname'=>$value->SURNAME]);
	// 	} catch (PDOException $e) {
	// 		echo 'Database Error in Query:'.$e;
	// 	}
	// 	$results_array = $stmt->fetchAll();
	// 	if (count($results_array)==0) {
	// 		DB::connection('mysql')->update("UPDATE bhmcSales SET patientID = :gpscID WHERE dexaID = :dexaID",['dexaID'=>$value->dexaID, 'gpscID'=>0]);
	// 	} else {
	// 		$patient = $results_array[0];
	// 		DB::connection('mysql')->update("UPDATE bhmcSales SET patientID = :gpscID WHERE dexaID = :dexaID",['dexaID'=>$value->dexaID, 'gpscID'=>$patient['ID']]);
	// 	}
	// }
	$db = null;
@endphp
<div class="table-responsive">
<table class="table">
	<thead>
		<tr>
			<th>dexaID</th>
			{{-- <th>saleID</th>
			<th>ITEMNUM</th>
			<th>PT_ID_FK</th> --}}
			{{-- <th>patientID</th> --}}
			{{-- <th>SERVICEDATE</th> --}}
			<th>FIRSTNAME</th>
			<th>SURNAME</th>
			{{-- <th>DOB</th> --}}
		</tr>
	</thead>
	<tbody>
		@foreach ($patientsHaveDexa as $item)
			<tr>
				<td>{{$item->dexaID}}</td>
				{{-- <td>{{$item->saleID}}</td>
				<td>{{$item->ITEMNUM}}</td>
				<td>{{$item->PT_ID_FK}}</td> --}}
				{{-- <td>{{$item->patientID}}</td> --}}
				{{-- <td>{{$item->SERVICEDATE}}</td> --}}
				<td>{{$item->FIRSTNAME}}</td>
				<td>{{$item->SURNAME}}</td>
				{{-- <td>{{$item->DOB}}</td> --}}
			</tr>
		@endforeach
		@php
			//$patientsHaveDexa = null;
			//echo "Hello";
			//var_dump($item->saleID);
		@endphp
	</tbody>
</table>
</div>
</body>
</html>