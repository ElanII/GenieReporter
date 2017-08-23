<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results5Controller extends Controller
{
    public function create()
    {
        return view('ha70_ResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('ha70_ResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}