<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminControl extends Controller
{
    //
    function displayusers() //go to all users page
    {
        return view('ADMIN.allusers');
    }

    function displayallfiles() //go to all files page
    {
        return view('ADMIN.allfilespage');
    }

    function displaymanagereq() //go to manage request page
    {
        return view('ADMIN.managereqpage');
    }

    function displayfloorplan() //go to manage request page
    {
        return view('ADMIN.floorplanpage');
    }

    
}
