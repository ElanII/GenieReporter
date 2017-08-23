<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results7Controller extends Controller
{
    public function create()
    {
        return view('cp_ResultsSMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('cp_ResultsBHGPSC',['clinic'=>'BHGPSC']);
    }
}