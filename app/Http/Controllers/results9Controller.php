<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results9Controller extends Controller
{
    public function create()
    {
        return view('shBMI_ResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('shBMI_ResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}