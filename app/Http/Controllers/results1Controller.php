<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results1Controller extends Controller
{
    public function create()
    {
        return view('results1SMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('results1BHGPSC',['clinic'=>'BHGPSC']);
    }
}
