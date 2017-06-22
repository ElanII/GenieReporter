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
	echo "<td><a  
				data-toggle='modal' 
				data-id='".$value['ID']."'
				data-name='".$value['SURNAME'].", ".$value['FIRSTNAME']."'
				data-target='#patientModal'
				href='#' 
				>".$value['SURNAME']."</a></td>";
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
	echo "
		<script type='text/javascript'>
			$(function() {
		    $('#patientModal').on('show.bs.modal', function (e) {
			     $('#patientModalLabel').html($(e.relatedTarget).data('name'));
			     $('#fav-id').html($(e.relatedTarget).data('id'));
			     var rowid = $(e.relatedTarget).data('id');
		        $.ajax({
		            type : 'GET',
		            url : '/api".$clinic."', //Here you will fetch records 
		            data :  'id='+ rowid,
		            success : function(data){
		            $('#fav-body').html(data);//Show fetched data from database
		            }
		        });
		    
		    });
			});
		</script>
		<div class='modal fade' id='patientModal' 
		     tabindex='-1' role='dialog' 
		     aria-labelledby='patientModalLabel'>
		  <div class='modal-dialog' role='document'>
		    <div class='modal-content'>
		      <div class='modal-header'>
		        <button type='button' class='close' 
		          data-dismiss='modal' 
		          aria-label='Close'>
		          <span aria-hidden='true'>&times;</span></button>
		        <h4 class='modal-title' 
		        id='patientModalLabel'>Patient Summary</h4>
		      </div>
		      <div class='modal-body' id='fav-body'>
		        <p>
		        Patient details
		        <b><span id='fav-title'>Searching...</span></b>
		        </p>
		        
		      </div>
		      <div class='modal-footer'>
		        <button type='button' 
		           class='btn btn-default' 
		           data-dismiss='modal'>Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	";
$db = null;
?>

<div class="panel-footer">
	<p>&copy; Duminda Manuwickrama</p>
</div>