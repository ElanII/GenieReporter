<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"All Patients coming in today that have NO My HR"])
	<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	@php
		
	@endphp

	{{-- Content --}}
	<div class="well well-lg">
		<div class="panel panel-default">
			<div class="panel-heading">Search for Appts needing BD70+</div>
			<div class="panel-body">
				<div class="form-group">
				{{ Form::open(array('route' => 'bd70Results')) }}
					<div class="row well-sm">
						<div class="col-md-6">
							<div class='input-group date' id='datetimepicker1'>
								<span class="input-group-addon">From</span>
			                    {{ Form::input('text', 'fromDate', null, ['class' => 'form-control', 'required' => 'true']) }}
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
					        <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker1').datetimepicker({
						                 format: 'DD/MM/YYYY'
						            });
					            });
					        </script>
						</div>
						<div class="col-md-6">
							<div class='input-group date' id='datetimepicker2'>
								<span class="input-group-addon">To</span>
			                    {{ Form::input('text', 'toDate', null, ['class' => 'form-control', 'required' => 'true']) }}
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
					        <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker2').datetimepicker({
						                 format: 'DD/MM/YYYY'
						            });
					            });
					        </script>
						</div>
					</div>
					<div class="input-group well-sm">
						{{ Form::submit('Search', array('class' => 'btn')) }}
					</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

	{{-- PHP Section for Query --}}
	
	<?php 
	// echo '<pre>' . var_export($PTID0, true) . '</pre>';
	// echo '<pre>' . var_export($PTID3, true) . '</pre>';
	// echo '<pre>' . var_export($option, true) . '</pre>';
	 ?>

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>