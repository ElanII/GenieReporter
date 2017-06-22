<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/apiBHGPSC', function(){
	return view('patient/apiBHGPSC');
});

Route::get('/apiSMC', function(){
	return view('patient/apiSMC');
});

Route::get('/{siteName}', function ($siteName) {
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	} else {
		return view('patient/api');
	}
	
	return view('welcome', compact('dsn','user','pass','clinic'));
});

Route::get('/phpinfo', function(){
	return view('phpinfo');
});

Route::get('/test', function(){
	return view('test');
});

Route::get('/report2/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report2', compact('dsn','user','pass','clinic'));
});

Route::get('/report1/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report1', compact('dsn','user','pass','clinic'));
});

Route::get('/report3/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report3', compact('dsn','user','pass','clinic'));
});

Route::get('/report4/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report4', compact('dsn','user','pass','clinic'));
});

Route::get('/report5/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report5', compact('dsn','user','pass','clinic'));
});

Route::get('/report6/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report6', compact('dsn','user','pass','clinic'));
});

Route::get('/report7/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report7', compact('dsn','user','pass','clinic'));
});

Route::get('/report8/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report8', compact('dsn','user','pass','clinic'));
});

Route::get('/report9/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report9', compact('dsn','user','pass','clinic'));
});

Route::get('/report10/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report10', compact('dsn','user','pass','clinic'));
});

Route::get('/report11/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report11', compact('dsn','user','pass','clinic'));
});

Route::get('/child/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('child', compact('dsn','user','pass','clinic'));
});

Route::get('/report0/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report0', compact('dsn','user','pass','clinic'));
});

Route::get('/allergy/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('allergy', compact('dsn','user','pass','clinic'));
});

Route::get('/familyHistory/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('familyHistory', compact('dsn','user','pass','clinic'));
});

Route::get('/riskFactors/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('riskFactors', compact('dsn','user','pass','clinic'));
});

Route::get('/smoking/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('smoking', compact('dsn','user','pass','clinic'));
});

Route::get('/culture/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('culture', compact('dsn','user','pass','clinic'));
});

Route::get('/pastHistory/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('pastHistory', compact('dsn','user','pass','clinic'));
});

Route::get('/currentProblem/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('currentProblem', compact('dsn','user','pass','clinic'));
});

Route::get('/currentMedications/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('currentMedications', compact('dsn','user','pass','clinic'));
});

Route::get('/vaccinations/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('vaccinations', compact('dsn','user','pass','clinic'));
});

Route::get('/drugReaction/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('drugReaction', compact('dsn','user','pass','clinic'));
});

Route::get('/report12/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report12', compact('dsn','user','pass','clinic'));
});

Route::get('/allergyReport/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('statReports.allergyReport', compact('dsn','user','pass','clinic'));
});

Route::get('/activepts/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('RACGP.activepts', compact('dsn','user','pass','clinic'));
});


Route::get('/myhr/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report14', compact('dsn','user','pass','clinic'));
});

Route::get('/todayAll/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report15', compact('dsn','user','pass','clinic'));
});

Route::get('/myhrYES/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report16', compact('dsn','user','pass','clinic'));
});

Route::get('/myhrNO/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('report17', compact('dsn','user','pass','clinic'));
});

Route::get('/apptSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('apptSearch', compact('dsn','user','pass','clinic'));
});

Route::get('/results1BHGPSC', function(){
	return view('results1BHGPSC');
});

Route::get('/results1SMC', function(){
	return view('results1SMC');
});

Route::post('/results1BHGPSC', 
  ['as' => 'results1BHGPSC', 'uses' => 'results1Controller@create2']);

Route::post('/results1SMC', 
  ['as' => 'results1SMC', 'uses' => 'results1Controller@create']);

Route::get('/shsSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('shsSearch', compact('dsn','user','pass','clinic'));
});

Route::post('/shsResultsBHGPSC', 
  ['as' => 'shsResultsBHGPSC', 'uses' => 'results2Controller@create2']);

Route::post('/shsResultsSMC', 
  ['as' => 'shsResultsSMC', 'uses' => 'results2Controller@create']);

Route::get('/shsResultsBHGPSC', function(){
	return view('shsResultsBHGPSC');
});

Route::get('/shsResultsSMC', function(){
	return view('shsResultsSMC');
});

Route::get('/summary', function(){
	return view('patient/summary');
});

Route::get('/summaryModal', function(){
	return view('patient/summaryModal');
});

Route::get('/diabToday/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('diabToday', compact('dsn','user','pass','clinic'));
});

Route::get('/diabSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('diabSearch', compact('dsn','user','pass','clinic'));
});

Route::get('/diab1BHGPSC', function(){
	return view('diab1BHGPSC');
});

Route::get('/diab1SMC', function(){
	return view('diab1SMC');
});

Route::post('/diab1BHGPSC', 
  ['as' => 'diab1BHGPSC', 'uses' => 'diab1Controller@create2']);

Route::post('/diab1SMC', 
  ['as' => 'diab1SMC', 'uses' => 'diab1Controller@create']);