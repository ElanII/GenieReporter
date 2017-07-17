<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results3Controller extends Controller
{
    public function create()
    {
        return view('hmrResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('hmrResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}