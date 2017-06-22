<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"RACGP - Active Patients"])
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
		$TimeAgo = date("Y-m-d H:i:s",strtotime('-24 month'));







		$sql0 = "SELECT PT_Id_Fk AS ID FROM Consult WHERE ConsultDate > :TimeAgo";
		try {
			$stmt0 = $db->prepare($sql0);
			$stmt0->execute([':TimeAgo'=> $TimeAgo]);
		} catch (PDOException $e0) {
			echo "Problem with initial database query:".$e0;
		}
		$results_array0 = $stmt0->fetchAll();
		foreach ($results_array0 as $value) {
			$PTS[]= $value['ID'];
		}
		$result0 = array_count_values($PTS);
		//echo '<pre>' . var_export($filtered, true) . '</pre>';

		function filterArray0($value){
			return ($value > 2);
		}
		$filtered0 = array_filter($result0,'filterArray0');
		$racgpActivePts = count($filtered0);




		$sql1 = "SELECT Id, Postcode FROM Patient WHERE Inactive = FALSE";
		try {
			$stmt1 = $db->prepare($sql1);
			$stmt1->execute();
		} catch (PDOException $e1) {
			echo "Problem with initial database query:".$e1;
		}
		$results_array1 = $stmt1->fetchAll();
		foreach ($results_array1 as $value) {
			$SUB[] = $value['POSTCODE'];
		}
		$result1 = array_count_values($SUB);
		function filterArray1($value){
			return ($value > 4);
		}
		$filtered1 = array_filter($result1,'filterArray1');
		//echo '<pre>' . var_export($filtered1, true) . '</pre>';
		//var_dump($filtered1);
		




		$sql2 = "SELECT SmokingFreq FROM Patient WHERE Inactive = FALSE";
		try {
			$stmt2 = $db->prepare($sql2);
			$stmt2->execute();
		} catch (PDOException $e2) {
			echo "Problem with initial database query:".$e2;
		}
		$db = null;
		$results_array2 = $stmt2->fetchAll();
		foreach ($results_array2 as $value) {
			$SMO[] = $value['SMOKINGFREQ'];
		}
		$result2 = array_count_values($SMO);
		function filterArray2($value){
			return ($value > 0);
		}
		$filtered2 = array_filter($result2,'filterArray2');
	?>


	<div class="container-fluid">
		{{-- Table Section --}}
		<div class="well-sm">
			<table class="table table-responsive table-bordered">
				<thead>
					<th>RACGP Total Active Patient Count (Minimum of 3 consults in the last 2 years)</th>
					<th>{{$racgpActivePts}}</th>
				</thead>
			</table>
		</div>

		{{-- Table Section --}}
		<div class="well-sm">
			<table class="table table-responsive table-bordered">
				<thead>
					<th>Total Active Patient count according to Genie (Marked as ACTIVE)</th>
					<th>{{count($results_array1)}}</th>
				</thead>
			</table>
		</div>

		{{-- Table Section --}}
		<div class="well-sm">
			<table class="table table-responsive table-bordered">
				<h4>Post Code Breakdown of Active Patients</h4>
				<thead>
					<th>Postcode</th>
					<th>Patient Count ( > 4 )</th>
				</thead>
				<tbody>
					@foreach ($filtered1 as $key => $element)
					<tr>
						<td>{{$key}}</td>
						<td>{{$element}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>


		{{-- Table Section --}}
		<div class="well-sm">
			<table class="table table-responsive table-bordered">
				<h4>Smoking Frequency Breakdown of Active Patients</h4>
				<thead>
					<th>Smoking Freq Indicator</th>
					<th>Smoking Status</th>
					<th>Patient Count</th>
				</thead>
				<tbody>
					@foreach ($filtered2 as $key => $element)
					<tr>
						<td>{{$key}}</td>
						<td><?php switch ($key) {
							case '0':
								$stat = 'No Info (No smoking status selected)';
								break;
							case '1':
								$stat = 'Daily';
								break;
							case '2':
								$stat = 'Weekly';
								break;
							case '3':
								$stat = 'Irregular';
								break;
							case '4':
								$stat = 'Ex-smoker';
								break;
							case '5':
								$stat = 'Never Smoked';
								break;
							default:
								$stat = 'Error';
								break;
						}?>{{$stat}}</td>
						<td>{{$element}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>