<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * This is the controller that receives the POST from
 * the FORM element, once 'routes/web' redirects it here.
 * Routes should use the appropriate Function (create/create2),
 * depending on the Site.
 */
class diab1Controller extends Controller
{
    public function create()
    {
        return view('diab1SMC',['clinic'=>'SMC']);
        // Returned Results page requires to know $clinic
        // variable. 
    }
    public function create2()
    {
        return view('diab1BHGPSC',['clinic'=>'BHGPSC']);
    }
}

// *******************************************************
