<?php
	// Defining Genie connection parameters.
	$dsn = Config::get('constants.dsn');
	$user = Config::get('constants.user');
	$pass = Config::get('constants.pass');

	// Connection to the server.
	$db = new PDO($dsn,$user,$pass);

	// Setting the filter Date.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));