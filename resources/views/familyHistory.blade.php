<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Family History Documentation"])
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<link href="style.css" media="all" rel="stylesheet">
<?php
	


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
	//echo '<pre>' . var_export($results_array1, true) . '</pre>';
	
	

	// Allergy Frequency Excluding Nil Known. Id => NumberOfAllergies.
	$sql2 = "SELECT DISTINCT Id FROM Patient WHERE FamilyHistory <> '' AND Inactive=FALSE"; 


	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$db = null;

	$results_array2 = $stmt2->fetchAll();
	$ptsWithFamilyHistory = count($results_array2);
	//echo '<pre>' . var_export($results_array2, true) . '</pre>';
	
	$ptsWithout = $activePatients - $ptsWithFamilyHistory;


?>
</head>
<body>
	@include('partials.sidebar')
	<div id="printThis" class="well-lg" style="margin:10;">
		<div style="font-family: 'Raleway', sans-serif;
                font-weight: 200; font-size: 34px;">
			Genie Reporter - Family History Information Stats.
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
							<li class="list-group-item"><b>RACGP minimum requirement:</b> 75% of patients must have some form of family history information on record</li>
							<li class="list-group-item"><b>Genie Record Keeping</b>
								<ul>
									<li>Social & Family History: Small window towards the top left corner of the clinical window: must have at something written in it</li>
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
						<td>Some form of Family History on Record</td>
						<td>{{$ptsWithFamilyHistory}}</td>
						<td>{{$ptsWithFamilyHistory / $activePatients * 100}} %</td>
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
	        text: 'Family History (Real-time)'
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
	            name: 'Family History on Record',
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