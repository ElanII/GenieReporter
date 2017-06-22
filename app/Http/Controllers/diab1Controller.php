<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class diab1Controller extends Controller
{
    public function create()
    {
        return view('diab1SMC',['clinic'=>'SMC']);
    }
    public function create2()
    {
        return view('diab1BHGPSC',['clinic'=>'BHGPSC']);
    }
}
