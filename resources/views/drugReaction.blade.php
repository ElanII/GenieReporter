<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Drug Reactions Documentation"])
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<link href="style.css" media="all" rel="stylesheet">
<?php

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);


	

	// Medication Allergy.
	$sql1 = "SELECT DISTINCT Id AS ID FROM Allergy WHERE (Classcode > 0)"; 


	try {
		$stmt1 = $db->prepare($sql1);
		$stmt1->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

	$results_array1 = $stmt1->fetchAll();
	$activePatients = count($results_array1); // ACTIVE PATIENTS
	
	




	// Has Medication Allergy with Details.
	$sql2 = "SELECT DISTINCT Id AS ID FROM Allergy WHERE (Classcode > 0 AND Detail <> '')"; 


	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$db = null;

	$results_array2 = $stmt2->fetchAll();
	$hasHistory = count($results_array2); // Has History





	// Comparison.
	function compareDeepValue($val1, $val2)
	{
	   return strcmp($val1['ID'], $val2['ID']);
	}

	$intersect = array_uintersect($results_array1, $results_array2, 'compareDeepValue');
	$hasHistoryAndActive = count($intersect);


	// Total
	$ptsWithout = $activePatients - $hasHistoryAndActive;
?>
</head>
<body>
	@include('partials.sidebar')
	<div id="printThis" class="well-lg" style="margin:10;">
		<div style="font-family: 'Raleway', sans-serif;
                font-weight: 200; font-size: 34px;">
			Genie Reporter - Drug Reactions for Drugs recorded as Allergies.
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
							<li class="list-group-item"><b>RACGP minimum requirement:</b> 75% Drug related Allergies must have a Reaction on record</li>
							<li class="list-group-item"><b>Genie Record Keeping</b>
								<ul>
									<li>Allergies: Small window to the top left on the clinical view</li>
									<li>If you insert a Medication as an allergy, it must have a reaction such as "rash" with it</li>
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
						<th>Number of Records</th>
						<th>Percentage</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>No Details on Medication Allergy</td>
						<td>{{$ptsWithout}}</td>
						<td>{{$ptsWithout / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Medication Allergy Has Details (Reactions)</td>
						<td>{{$hasHistoryAndActive}}</td>
						<td>{{$hasHistoryAndActive / $activePatients * 100}} %</td>
					</tr>
					<tr>
						<td>Total Medication Allergies on Record</td>
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
	        text: 'Drug Reactions Stats (Real-time)'
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
	        name: 'Medication Allergies',
	        colorByPoint: true,
	        data: [{
	            name: 'Details Recorded',
	            y: {{$hasHistoryAndActive}}
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