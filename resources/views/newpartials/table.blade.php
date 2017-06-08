<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>{{$title}}</b>
		</div>
		<div>
			<div class='input-group-addon'> Active Status: 
						<input onchange='filterme()' type='radio' name='free' value='0'>0
						<input onchange='filterme()' type='radio' name='free' value='1'>1
						<input onchange='filterme()' type='radio' name='free' value='' checked>All
			</div>
		</div>

		<br>

		<div class="panel-body">
			<div class="container-fluid table-responsive">
				<table class="table table-striped table-bordered" id="mytable">
					<thead>
						<tr>
							<td>Active</td>
							<td>Surname</td>
							<td>First Name</td>
							<td>Date of birth</td>
							<td>Chart No</td>
							<td>Last Seen</td>
							<td>Home Phone</td>
							<td>Mobile Phone</td>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td>Active</td>
							<td>Surname</td>
							<td>First Name</td>
							<td>Date of birth</td>
							<td>Chart No</td>
							<td>Last Seen</td>
							<td>Home Phone</td>
							<td>Mobile Phone</td>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($results_array as $value)
							<?PHP
								$DOB = substr($value['DOB'], 0,strrpos($value['DOB'], ' '));
								$LSD = substr($value['LASTSEENDATE'], 0,strrpos($value['LASTSEENDATE'], '.'));
								$DOB = date('d-m-Y',strtotime($DOB));
								$LSD = date('d-m-Y',strtotime($LSD));
							?>
							<tr>
								<td>{{$value['INACTIVE']}}</td>
								<td><a  
								data-toggle="modal" 
								data-id="{{$value['ID']}}"
								data-name="{{$value['SURNAME']}}, {{$value['FIRSTNAME']}}"
								data-target="#patientModal"
								href="patient/summaryModal" 
								>{{$value['SURNAME']}}</a></td>
								<td>{{$value['FIRSTNAME']}}</td>
								<td>{{$DOB}}</td>
								<td>{{$value['CHARTORNHS']}}</td>
								<td>{{$LSD}}</td>
								<td>{{$value['HOMEPHONE']}}</td>
								<td>{{$value['MOBILEPHONE']}}</td>
							</tr>
						@endforeach
						{{$db= null}}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
    $('#patientModal').on("show.bs.modal", function (e) {
	     $("#patientModalLabel").html($(e.relatedTarget).data('name'));
	     $("#fav-id").html($(e.relatedTarget).data('id'));
	     var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'GET',
            url : 'api', //Here you will fetch records 
            data :  'id='+ rowid, //Pass $id
            success : function(data){
            $('#fav-body').html(data);//Show fetched data from database
            }
        });
    });
});
</script>
<div class="modal fade" id="patientModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="patientModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="patientModalLabel">Patient Summary</h4>
      </div>
      <div class="modal-body" id="fav-body">
        <p>
        Patient details
        <b><span id="fav-title">Searching...</span></b>
        </p>
        
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Close</button>
        {{-- <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add to Favorites
          </button>
        </span> --}}
      </div>
    </div>
  </div>
</div>

