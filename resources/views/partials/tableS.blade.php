<?php

	// Active Patients Fileter Radio Buttons.
	echo 	"<div><div class='input-group-addon'> Active Status: 
				<input onchange='filterme()' type='radio' name='free' value='0'>0
				<input onchange='filterme()' type='radio' name='free' value='1'>1
			<input onchange='filterme()' type='radio' name='free' value='' checked>All
			</div></div><br>";



	echo '<div class="panel-body">';
	echo '<div class="container-fluid table-responsive">';
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
	echo '</div>';
$db = null;
?>

<div class="panel-footer">
	<p>&copy; Duminda Manuwickrama</p>
</div>