<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Ethnicity Documentation"])
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<link href="style.css" media="all" rel="stylesheet">
<?php
	
	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');

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
	$activePatients = count($results_array1); // ACTIVE PATIENTS
	
	

	// Non-Indigenous.
	$sql2 = "SELECT DISTINCT Id FROM Patient WHERE (Ethnicity LIKE '%Non-Indigenous%' OR CultureCode = 9) AND Inactive=FALSE"; 


	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array2 = $stmt2->fetchAll();
	$nonIndigenous = count($results_array2);

	// Aboriginals.
	$sql3 = "SELECT DISTINCT Id FROM Patient WHERE (Ethnicity LIKE '%Aboriginal%' OR CultureCode = 1) AND Inactive=FALSE"; 


	try {
		$stmt3 = $db->prepare($sql3);
		$stmt3->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array3 = $stmt3->fetchAll();
	$aboriginal = count($results_array3);

	

	// Torres.
	$sql4 = "SELECT DISTINCT Id FROM Patient WHERE (CultureCode = 2) AND Inactive=FALSE"; 


	try {
		$stmt4 = $db->prepare($sql4);
		$stmt4->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array4 = $stmt4->fetchAll();
	$torres = count($results_array4);


	// Something.
	$sql5 = "SELECT DISTINCT Id FROM Patient WHERE (Ethnicity  <> '' OR CultureCode NOT IN (1,2)) AND Inactive=FALSE"; 


	try {
		$stmt5 = $db->prepare($sql5);
		$stmt5->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$db = null;

	$results_array5 = $stmt5->fetchAll();
	$something = count($results_array5);
	
	$ptsWithout = $activePatients - $nonIndigenous -$aboriginal -$torres;
?>
</head>
<body>
	@include('partials.sidebar')
	<div id="printThis" class="well-lg" style="margin:10;">
		<div style="font-family: 'Raleway', sans-serif;
                font-weight: 200; font-size: 34px;">
			Genie Reporter - Ethnicity Information Stats.
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="panel-info" id="familyHistoryChart" style="min-width: 310px; height: 50%; max-width: 80%; margin: 10 auto"></div>
				</div>
				<div class="col-lg-6">
					<div class="panel-primary panel">
						<div class="panel-heading">
							<h3 class="panel-title">&spades; Information</h3>
						</div>
						<div class="panel-body">
							<li class="list-group-item"><b>RACGP minimum requirement:</b> 75% of patients must have their ethnicity information on record</li>
							<li class="list-group-item"><b>Genie Record Keeping</b>
								<ul>
									<li>Indegenous Status: Edit Patient (blonde head) : Can be found in the "secodary" pane : Select one of 3 checkboxes</li>
								</ul>
							</li>
						</div>
					</div>
				</div>
			</div>
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
						<td>{{$ptsWithout}}</td>
						<td>{{$ptsWithout / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Non-Indigenous (Ethnicity contains 'Non-indigenous' OR Indigenous Status: 'Neither' is checked)</td>
						<td>{{$nonIndigenous}}</td>
						<td>{{$nonIndigenous / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Aboriginal (Ethnicity contains 'Aboriginal' OR Indigenous Status: 'Aboriginal Origin' is checked)</td>
						<td>{{$aboriginal}}</td>
						<td>{{$aboriginal / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Torres Strait Islander (Indigenous Status: 'TSI Origin' is checked)</td>
						<td>{{$torres}}</td>
						<td>{{$torres / $activePatients * 100}} %</td>
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
	        text: 'Ethnicity (Real-time)'
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
	            name: 'Non-Indigenous',
	            y: {{$nonIndigenous}}
	        },{
	            name: 'Aboriginal',
	            y: {{$aboriginal}}
	        },{
	            name: 'Torres Strait Islander',
	            y: {{$torres}}
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