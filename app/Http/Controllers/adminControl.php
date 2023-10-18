<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminControl extends Controller
{
    //
    function displayusers()
    {
        return view('ADMIN.allusers');
    }

    
}
