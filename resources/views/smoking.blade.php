<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Smoking Documentation"])
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<link href="style.css" media="all" rel="stylesheet">
<?php

	// $dsn = '4D:host=10.10.10.153;port=19812;charset=UTF-8';
	// $user = 'rec3';
	// $pass = 'biancarec3';
	
	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);


	

	// Active Patient IDs.
	$sql1 = "SELECT DISTINCT Id FROM Patient WHERE Inactive=FALSE AND Age > 10"; 


	try {
		$stmt1 = $db->prepare($sql1);
		$stmt1->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array1 = $stmt1->fetchAll();
	$activePatients = count($results_array1); // ACTIVE PATIENTS
	//echo '<pre>' . var_export($results_array1, true) . '</pre>';
	
	

	// Allergy Frequency Excluding Nil Known. Id => NumberOfAllergies.
	$sql2 = "SELECT DISTINCT Id FROM Patient WHERE (SmokingInfo <> '' OR SmokingFreq > 0) AND Inactive=FALSE"; 


	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array2 = $stmt2->fetchAll();
	$ptsWithFamilyHistory = count($results_array2);
	//echo '<pre>' . var_export($results_array2, true) . '</pre>';
	
	$ptsWithout = $activePatients - $ptsWithFamilyHistory;



	// Allergy Frequency Excluding Nil Known. Id => NumberOfAllergies.
	$sql3 = "SELECT DISTINCT Id FROM Patient WHERE Age > 10 AND Inactive=FALSE"; 


	try {
		$stmt3 = $db->prepare($sql3);
		$stmt3->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array3 = $stmt3->fetchAll();
	$overAge = count($results_array3);
	//echo '<pre>' . var_export($results_array3, true) . '</pre>';
?>
</head>
<body>
	@include('partials.sidebar')

	<div id="printThis" class="well-lg" style="margin:10;">
		<div style="font-family: 'Raleway', sans-serif;
                font-weight: 200; font-size: 34px;">
			Genie Reporter - Smoking Information Stats.
		</div>

		<div class="panel-info" id="familyHistoryChart" style="min-width: 310px; height: 40%; max-width: 40%; margin: 10 auto">
			
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
						<td>Nothing Recorded (Smoking Freq is Zero AND No Smoking info at all)</td>
						<td>{{$ptsWithout}}</td>
						<td>{{$ptsWithout / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Smoking Frequency not Zero OR Some information in Smoking Info</td>
						<td>{{$ptsWithFamilyHistory}}</td>
						<td>{{$ptsWithFamilyHistory / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Total Active Patients Over the Age of 10</td>
						<td>{{$activePatients}}</td>
						<td>100 %</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="well-sm">
		<button id="btnPrint" class="btn-success">Print</button>
	</div><br>
	@include('partials.footer')
</body>
<script type="text/javascript">
	
	Highcharts.chart('familyHistoryChart', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Smoking Information (Real-time)'
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
	            name: 'Smoking Information on Record',
	            y: {{$ptsWithFamilyHistory}}
	        }, {
	            name: 'Nothing Recorded',
	            y: {{$ptsWithout}},
	            sliced: true,
	            selected: true
	        }]
	    }]
	});
</script>
@include('partials.statfooter')
</html>