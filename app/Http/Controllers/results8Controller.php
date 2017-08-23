<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results8Controller extends Controller
{
    public function create()
    {
        return view('shSmoker_ResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('shSmoker_ResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}