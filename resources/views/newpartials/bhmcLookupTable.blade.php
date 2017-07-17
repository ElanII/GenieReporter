<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>{{$title}}</b>
		</div>

		<br>

		<div class="panel-body">
			<div class="container-fluid table-responsive">
				<table class="table table-striped table-bordered" id="mytable">
					<thead>
						<tr>
							<td>Item Number</td>
							<td>Surname</td>
							<td>First Name</td>
							<td>Date of birth</td>
							<td>Service Date</td>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td>Item Number</td>
							<td>Surname</td>
							<td>First Name</td>
							<td>Date of birth</td>
							<td>Service Date</td>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($bhmcSales as $item)
							<tr>
								<td>{{$item->ITEMNUM}}</td>
								<td>{{$item->SURNAME}}</td>
								<td>{{$item->FIRSTNAME}}</td>
								<td>{{$item->DOB}}</td>
								<td>{{$item->SERVICEDATE}}</td>
							</tr>
						@endforeach
					</tbody>
					@php
						$bhmcSales=null;
					@endphp
				</table>
			</div>
		</div>
	</div>
</div>

