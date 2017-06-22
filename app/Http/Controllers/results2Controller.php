<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results2Controller extends Controller
{
    public function create()
    {
        return view('shsResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('shsResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}
