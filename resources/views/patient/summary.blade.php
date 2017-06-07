<!DOCTYPE html>
<html>
<head>

	{{-- PHP Section for Query --}}
<?php

	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');
	$ptId = $_GET['id'];

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);

	// Creating the SQL statement
	// 50 Year olds who have not been seen in the past 12 months.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
	$sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Id =".$ptId." ";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$db = null;

$results_array = $stmt->fetchAll();
$patient = $results_array[0];
$DOB = substr($patient['DOB'], 0,strrpos($patient['DOB'], ' '));
$LSD = substr($patient['LASTSEENDATE'], 0,strrpos($patient['LASTSEENDATE'], '.'));
$DOB = date('d-m-Y',strtotime($DOB));
$LSD = date('d-m-Y',strtotime($LSD));

?>
	@include('newpartials/head',['title'=> $patient['SURNAME'].', '.$patient['FIRSTNAME']])
</head>
<body>

	{{-- Content --}}
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading">{{$patient['SURNAME'].', '.$patient['FIRSTNAME']}}</div>
		</div>
		<div class="panel-body">
			<div class="container-fluid table-responsive">
				<table class="table table-striped table-bordered"  id="mytable">
					<thead>
						<tr>
							<td>Field</td>
							<td>Value</td>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td>Field</td>
							<td>Value</td>
						</tr>
					</tfoot>
					<tbody>
						<tr>
							<td>Surname</td>
							<td>{{$patient['SURNAME']}}</td>
						</tr>
						<tr>
							<td>First name</td>
							<td>{{$patient['FIRSTNAME']}}</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>{{$DOB}}</td>
						</tr>
						<tr>
							<td>Mobile phone</td>
							<td>{{$patient['MOBILEPHONE']}}</td>
						</tr>
						<tr>
							<td>Home phone</td>
							<td>{{$patient['HOMEPHONE']}}</td>
						</tr>
						<tr>
							<td>Last seen date</td>
							<td>{{$LSD}}</td>
						</tr>
						<tr>
							<td>Chart No</td>
							<td>{{$patient['CHARTORNHS']}}</td>
						</tr>
						<tr>
							<td>Age</td>
							<td>{{$patient['AGE']}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>