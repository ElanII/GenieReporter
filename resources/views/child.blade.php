@extends('layouts.app')

@section('title', 'Report1')

@section('sidebar')
    @parent

    <p>50 Year Olds who have not been seen in the past 12 months</p>
@endsection

@section('content')
    <?php

	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);

	// Creating the SQL statement
	// 50 Year olds who have not been seen in the past 12 months.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
	$sql1 = "SELECT FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Age>=50 AND Postcode LIKE '%2880%' AND LastSeenDate <= :YearAgo";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute([':YearAgo'=> $YearAgo]);
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}
	$results_array = $stmt->fetchAll();
		echo '<div class="container container-fluid">';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading"><b>'.'50 Year Olds who have not been seen in the past 12 months'.'</b></div>';

		// Active Patients Fileter Radio Buttons.
		echo 	"<div><div class='input-group-addon'> Active Status: 
  				<input onchange='filterme()' type='radio' name='free' value='0'>0
  				<input onchange='filterme()' type='radio' name='free' value='1'>1
    			<input onchange='filterme()' type='radio' name='free' value=''>All
    			</div></div><br>";



		echo '<div class="panel-body">';
		echo '<table class="table table-striped table-bordered" id="mytable">';
		echo '<thead>';
		// Table Headings
		echo '<tr>'.'<td>Active</td>'.'<td>Surname</td>'.'<td>First Name</td>'.'<td>Date of birth</td>'.'<td>Chart No</td>'.'<td>Last Seen</td>'.'<td>Home Phone</td>'.'<td>Mobile Phone</td>'.'</tr>';
		echo '</thead>';
		echo '<tfoot>';
		// Table Footer
		echo '<tr>'.'<td>Active</td>'.'<td>Surname</td>'.'<td>First Name</td>'.'<td>Date of birth</td>'.'<td>Chart No</td>'.'<td>Last Seen</td>'.'<td>Home Phone</td>'.'<td>Mobile Phone</td>'.'</tr>';
		echo '</tfoot>';
		echo '<tbody>';
	// Table Data Rows
	foreach ($results_array as $value) {
		// Getting rid of the time values in Dates.
		$DOB = substr($value['DOB'], 0,strrpos($value['DOB'], ' '));
		$LSD = substr($value['LASTSEENDATE'], 0,strrpos($value['LASTSEENDATE'], '.'));
		$DOB = date('d-m-Y',strtotime($DOB));
		$LSD = date('d-m-Y',strtotime($LSD));
		
		echo '<tr>';
		
		echo '<td>'.$value['INACTIVE'].'</td>';
		echo '<td>'.$value['SURNAME'].'</td>';
		echo '<td>'.$value['FIRSTNAME'].'</td>';
		echo '<td>'.$DOB.'</td>';
		echo '<td>'.$value['CHARTORNHS'].'</td>';
		echo '<td>'.$LSD.'</td>';
		echo '<td>'.$value['HOMEPHONE'].'</td>';
		echo '<td>'.$value['MOBILEPHONE'].'</td>';
		echo '</tr>';
	}
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	$db = null;

?>
@endsection