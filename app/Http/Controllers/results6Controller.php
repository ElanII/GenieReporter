<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results6Controller extends Controller
{
    public function create()
    {
        return view('dexa24Results',['clinic'=>'BHGPSC']);
    }
}