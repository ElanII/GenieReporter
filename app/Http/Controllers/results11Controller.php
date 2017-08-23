<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class results11Controller extends Controller
{
    public function create()
    {
        return view('bd70Results',['clinic'=>'BHGPSC']);
    }
}