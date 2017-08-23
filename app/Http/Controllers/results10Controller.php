<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results10Controller extends Controller
{
    public function create()
    {
        return view('ausdrisk_ResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('ausdrisk_ResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}