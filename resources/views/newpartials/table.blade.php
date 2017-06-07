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
								<td><a target="_blank" href=/summary?id={{$value['ID']}}>{{$value['SURNAME']}}</a></td>
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
