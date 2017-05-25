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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function(){
	return view('phpinfo');
});

Route::get('/test', function(){
	return view('test');
});

Route::get('/report2', function(){
	return view('report2');
});

Route::get('/report1', function(){
	return view('report1');
});

Route::get('/report3', function(){
	return view('report3');
});

Route::get('/report4', function(){
	return view('report4');
});

Route::get('/report5', function(){
	return view('report5');
});

Route::get('/report6', function(){
	return view('report6');
});

Route::get('/report7', function(){
	return view('report7');
});

Route::get('/report8', function(){
	return view('report8');
});

Route::get('/report9', function(){
	return view('report9');
});

Route::get('/report10', function(){
	return view('report10');
});

Route::get('/report11', function(){
	return view('report11');
});

Route::get('/child', function(){
	return view('child');
});

Route::get('/report0', function(){
	return view('report0');
});

Route::get('/allergy', function(){
	return view('allergy');
});

Route::get('/familyHistory', function(){
	return view('familyHistory');
});

Route::get('/riskFactors', function(){
	return view('riskFactors');
});

Route::get('/smoking', function(){
	return view('smoking');
});

Route::get('/culture', function(){
	return view('culture');
});

Route::get('/pastHistory', function(){
	return view('pastHistory');
});

Route::get('/currentProblem', function(){
	return view('currentProblem');
});

Route::get('/currentMedications', function(){
	return view('currentMedications');
});

Route::get('/vaccinations', function(){
	return view('vaccinations');
});

Route::get('/drugReaction', function(){
	return view('drugReaction');
});

Route::get('/report12', function(){
	return view('report12');
});

Route::get('/allergyReport', function(){
	return view('statReports.allergyReport');
});

Route::get('/activepts', function(){
	return view('RACGP.activepts');
});


Route::get('/myhr', function(){
	return view('report14');
});

Route::get('/todayAll', function(){
	return view('report15');
});

Route::get('/myhrYES', function(){
	return view('report16');
});

Route::get('/myhrNO', function(){
	return view('report17');
});

Route::get('/apptSearch', function(){
	return view('apptSearch');
});

Route::get('/results1', function(){
	return view('results1');
});

Route::post('/results1', 
  ['as' => 'results1', 'uses' => 'results1Controller@create']);



