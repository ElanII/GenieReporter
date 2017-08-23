<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results4Controller extends Controller
{
    public function create()
    {
        return view('ha4549_ResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('ha4549_ResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}