<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Allegy Statistics"])
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<link href="style.css" media="all" rel="stylesheet">
<?php

	// $dsn = '4D:host=10.10.10.153;port=19812;charset=UTF-8';
	// $user = 'rec3';
	// $pass = 'biancarec3';
	
	$dsn = '4D:host=10.10.10.26;port=19812;charset=UTF-8';
	$user = 'Back Office User';
	$pass = 'bianca';

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);


	

	// Active Patient IDs.
	$sql1 = "SELECT DISTINCT Id FROM Patient WHERE Inactive=FALSE"; 


	try {
		$stmt1 = $db->prepare($sql1);
		$stmt1->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array1 = $stmt1->fetchAll();
	$activePatients = count($results_array1);
	//echo '<pre>' . var_export($results_array1, true) . '</pre>';
	
	

	// Allergy Frequency Excluding Nil Known. Id => NumberOfAllergies.
	$sql2 = "SELECT DISTINCT PT_Id_Fk AS ID, COUNT(PT_Id_Fk) AS Freq FROM Allergy WHERE Allergy NOT LIKE '%Nil Known%' GROUP BY PT_Id_Fk"; 


	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array2 = $stmt2->fetchAll();
	//echo '<pre>' . var_export($results_array2, true) . '</pre>';



	// Allergy Frequency all. Id => NumberOfAllergies.
	$sql3 = "SELECT DISTINCT PT_Id_Fk AS ID, COUNT(PT_Id_Fk) AS Freq FROM Allergy GROUP BY PT_Id_Fk"; 


	try {
		$stmt3 = $db->prepare($sql3);
		$stmt3->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array3 = $stmt3->fetchAll();
	//echo '<pre>' . var_export($results_array3, true) . '</pre>';


	// Comparison
	function compareDeepValue($val1,$val2){
		return strcmp($val1['ID'], $val2['ID']);
	}
	$comparison1 = array_uintersect($results_array1, $results_array2, 'compareDeepValue'); // ACTIVE + SPECIFIC_ALLERGY
	//echo '<pre>' . var_export($comparison1, true) . '</pre>';
	$comparison2 = array_uintersect($results_array1, $results_array3, 'compareDeepValue'); // ACTIVE + ANY_ALLERGY
	//echo '<pre>' . var_export($comparison2, true) . '</pre>';
	

	$nothingRecorded = (count($results_array1)-count($comparison2)); // ACTIVE - (ACTIVE+ANY_ALLERGY)
	$allergyRecorded = (count($comparison1));						// ACTIVE + SPECIFIC_ALLERGY
	$noKnownAllergies = (count($results_array1)-count($comparison1)-$nothingRecorded); // The rest.


?>
</head>
<body>
	@include('partials.sidebar')

	<div id="printThis" class="well-lg" style="margin:10;">
		<div style="font-family: 'Raleway', sans-serif;
                font-weight: 200; font-size: 34px;">
			Genie Reporter - Allergy Information Stats.
		</div>
		<div class="panel-info" id="allergyChart" style="min-width: 310px; height: 40%; max-width: 40%; margin: 10 auto">
		
		</div>
		<div class="panel-info table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Catagory</th>
						<th>Number of Patients</th>
						<th>Percentage</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Nothing Recorded</td>
						<td>{{$nothingRecorded}}</td>
						<td>{{$nothingRecorded / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>No Known Allergies</td>
						<td>{{$noKnownAllergies}}</td>
						<td>{{$noKnownAllergies / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Specific Allergy Recorded</td>
						<td>{{$allergyRecorded}}</td>
						<td>{{$allergyRecorded / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Allergy Information Present</td>
						<td>{{$allergyRecorded + $noKnownAllergies}}</td>
						<td>{{($allergyRecorded + $noKnownAllergies) / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Total Active Patients</td>
						<td>{{$activePatients}}</td>
						<td>100 %</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="well-lg">
		<button id="btnPrint" class="btn-success">Print</button>
	</div><br>
	@include('partials.footer')
</body>
<script type="text/javascript">
	Highcharts.chart('allergyChart', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Allergy Statistics (Real-time)'
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                style: {
	                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                }
	            }
	        }
	    },
	    series: [{
	        name: 'Patients',
	        colorByPoint: true,
	        data: [{
	            name: 'Allergy Recorded',
	            y: {{$allergyRecorded}}
	        }, {
	            name: 'Nothing Recorded',
	            y: {{$nothingRecorded}},
	            sliced: true,
	            selected: true
	        }, {
	            name: 'No Known Allergies',
	            y: {{$noKnownAllergies}}
	        }]
	    }]
	});
</script>
@include('partials.statfooter')
</html>