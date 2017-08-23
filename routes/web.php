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








/**
 * These are the Routes used to generate information
 * for the 'modal' views, found within the partials.TableS and
 * newpartials.Table.
 */
Route::get('/apiBHGPSC', function(){
	return view('patient/apiBHGPSC');
});


Route::get('/playground', function(){
	return view('playground');
});

Route::get('/apiSMC', function(){
	return view('patient/apiSMC');
});

Route::get('/apiSaleItems', function(){
	return view('patient/apiSaleItems');
});

Route::get('/apiHABHGPSC', function(){
	return view('patient/apiHABHGPSC');
});

Route::get('/apiHASMC', function(){
	return view('patient/apiHASMC');
});
// *********************************************************


Route::get('/', function () {
	return view('selectClinic');
});


Route::get('/phpinfo', function(){
	return view('phpinfo');
});

/**
 * Special view for copying the "Column Order" from one user to another.
 */
Route::get('/columnCopy', function(){
	return view('columnCopy');
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
	} 
	
	return view('welcome', compact('dsn','user','pass','clinic'));
});

Route::get('bhmcLookup/{siteName}', function ($siteName) {
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
	
	return view('bhmcLookup', compact('dsn','user','pass','clinic'));
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

/**
 * Results pages for Search Results. The search page carries
 * the FORM element that points to only one of the below Results
 * pages, depending on the $clinic variable of that page.
 */
Route::get('/diab1BHGPSC', function(){
	return view('diab1BHGPSC'); 
});

Route::get('/diab1SMC', function(){
	return view('diab1SMC');
});

Route::post('/diab1BHGPSC', // Form if POST to this Route.
  ['as' => 'diab1BHGPSC', 'uses' => 'diab1Controller@create2']);
  // Look for this CONTROLLER@FUNCTION in 'app/Http/Controllers/' 

Route::post('/diab1SMC', // Form if POST to this Route.
  ['as' => 'diab1SMC', 'uses' => 'diab1Controller@create']);
// ***********************************


/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/diabAll/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('diabAll', compact('dsn','user','pass','clinic'));
});
// *******************************************************

Route::get('/ha4549/{siteName}', function($siteName){
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
	
	return view('ha4549', compact('dsn','user','pass','clinic'));
});

Route::get('/ha75/{siteName}', function($siteName){
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
	
	return view('ha75', compact('dsn','user','pass','clinic'));
});

Route::get('/haATSI/{siteName}', function($siteName){
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
	
	return view('haATSI', compact('dsn','user','pass','clinic'));
});

Route::get('/bd70/{siteName}', function($siteName){
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
	
	return view('bd70', compact('dsn','user','pass','clinic'));
});

/**
 * IMPORTANT: Never Load/Use this view. This is used to find 
 * GPSC patinet IDs for BHMC patients.
 *
 * Change the ItemNum on this View as required and update the application Database
 * for BHMC Sales.
 *
 * This is required for accurate reading of results for BHMC Sales,
 * if the ItemNum are being searched for.
 */
Route::get('/update/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('update', compact('dsn','user','pass','clinic'));
});
// *******************************************************

/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/dexa24/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('dexa24', compact('dsn','user','pass','clinic'));
});
// *******************************************************

/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/dexa24apptSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('dexa24apptSearch', compact('dsn','user','pass','clinic'));
});

Route::post('/dexa24Results', 
  ['as' => 'dexa24Results', 'uses' => 'results6Controller@create']);
// *******************************************************

/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/dexa12/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('dexa12', compact('dsn','user','pass','clinic'));
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/hmrSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('hmrSearch', compact('dsn','user','pass','clinic'));
});

Route::post('/hmrResultsBHGPSC', 
  ['as' => 'hmrResultsBHGPSC', 'uses' => 'results3Controller@create2']);

Route::post('/hmrResultsSMC', 
  ['as' => 'hmrResultsSMC', 'uses' => 'results3Controller@create']);

Route::get('/hmrResultsBHGPSC', function(){
	return view('hmrResultsBHGPSC');
});

Route::get('/hmrResultsSMC', function(){
	return view('hmrResultsSMC');
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/ha4549_searchbyprovider/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('ha4549_searchbyprovider', compact('dsn','user','pass','clinic'));
});

Route::post('/ha4549_ResultsBHGPSC', 
  ['as' => 'ha4549_ResultsBHGPSC', 'uses' => 'results4Controller@create2']);

Route::post('/ha4549_ResultsSMC', 
  ['as' => 'ha4549_ResultsSMC', 'uses' => 'results4Controller@create']);

Route::get('/ha4549_ResultsBHGPSC', function(){
	return view('ha4549_ResultsBHGPSC');
});

Route::get('/ha4549_ResultsSMC', function(){
	return view('ha4549_ResultsSMC');
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/ha70_searchbyprovider/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('ha70_searchbyprovider', compact('dsn','user','pass','clinic'));
});

Route::post('/ha70_ResultsBHGPSC', 
  ['as' => 'ha70_ResultsBHGPSC', 'uses' => 'results5Controller@create2']);

Route::post('/ha70_ResultsSMC', 
  ['as' => 'ha70_ResultsSMC', 'uses' => 'results5Controller@create']);

Route::get('/ha70_ResultsBHGPSC', function(){
	return view('ha70_ResultsBHGPSC');
});

Route::get('/ha70_ResultsSMC', function(){
	return view('ha70_ResultsSMC');
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/cp_providerSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('cp_providerSearch', compact('dsn','user','pass','clinic'));
});

Route::post('/cp_ResultsBHGPSC', 
  ['as' => 'cp_ResultsBHGPSC', 'uses' => 'results7Controller@create2']);

Route::post('/cp_ResultsSMC', 
  ['as' => 'cp_ResultsSMC', 'uses' => 'results7Controller@create']);

Route::get('/cp_ResultsBHGPSC', function(){
	return view('cp_ResultsBHGPSC');
});

Route::get('/cp_ResultsSMC', function(){
	return view('cp_ResultsSMC');
});
// *******************************************************

/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/smokers_StayHealthy/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('smokers_StayHealthy', compact('dsn','user','pass','clinic'));
});
// *******************************************************

/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/bmi_StayHealthy/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('bmi_StayHealthy', compact('dsn','user','pass','clinic'));
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/shSmoker_searchbyprovider/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('shSmoker_searchbyprovider', compact('dsn','user','pass','clinic'));
});

Route::post('/shSmoker_ResultsBHGPSC', 
  ['as' => 'shSmoker_ResultsBHGPSC', 'uses' => 'results8Controller@create2']);

Route::post('/shSmoker_ResultsSMC', 
  ['as' => 'shSmoker_ResultsSMC', 'uses' => 'results8Controller@create']);

Route::get('/shSmoker_ResultsBHGPSC', function(){
	return view('shSmoker_ResultsBHGPSC');
});

Route::get('/shSmoker_ResultsSMC', function(){
	return view('shSmoker_ResultsSMC');
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/shBMI_searchbyprovider/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('shBMI_searchbyprovider', compact('dsn','user','pass','clinic'));
});

Route::post('/shBMI_ResultsBHGPSC', 
  ['as' => 'shBMI_ResultsBHGPSC', 'uses' => 'results9Controller@create2']);

Route::post('/shBMI_ResultsSMC', 
  ['as' => 'shBMI_ResultsSMC', 'uses' => 'results9Controller@create']);

Route::get('/shBMI_ResultsBHGPSC', function(){
	return view('shBMI_ResultsBHGPSC');
});

Route::get('/shBMI_ResultsSMC', function(){
	return view('shBMI_ResultsSMC');
});
// *******************************************************

/**
 * Search Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/ausdrisk_searchbyprovider/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('ausdrisk_searchbyprovider', compact('dsn','user','pass','clinic'));
});

Route::post('/ausdrisk_ResultsBHGPSC', 
  ['as' => 'ausdrisk_ResultsBHGPSC', 'uses' => 'results10Controller@create2']);

Route::post('/ausdrisk_ResultsSMC', 
  ['as' => 'ausdrisk_ResultsSMC', 'uses' => 'results10Controller@create']);

Route::get('/ausdrisk_ResultsBHGPSC', function(){
	return view('ausdrisk_ResultsBHGPSC');
});

Route::get('/ausdrisk_ResultsSMC', function(){
	return view('ausdrisk_ResultsSMC');
});
// *******************************************************


/**
 * View Page that identifies the Clinic from end of URL and
 * uses the respective DB connection settings. Search pages
 * are the same, they will additionally have a FORM element
 * that POST to 2 different Results pages as seen above.
 */
Route::get('/bd70apptSearch/{siteName}', function($siteName){
	if ($siteName=='SMC' || $siteName=='smc') {
		$dsn = Config::get('constants.dsn1');
		$user = Config::get('constants.user1');
		$pass = Config::get('constants.pass1');
		$clinic = Config::get('constants.clinic1');
		// Look for these variables inside 'config/constants.php'
	} elseif ($siteName=='BHGPSC' || $siteName=='bhgpsc') {
		$dsn = Config::get('constants.dsn');
		$user = Config::get('constants.user');
		$pass = Config::get('constants.pass');
		$clinic = Config::get('constants.clinic');
	}
	
	return view('bd70apptSearch', compact('dsn','user','pass','clinic'));
});

Route::post('/bd70Results', 
  ['as' => 'bd70Results', 'uses' => 'results11Controller@create']);
// *******************************************************