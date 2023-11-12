<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class userControl extends Controller
{
    //

    function userallfiles() //go to all files page
    {
        return view('user.userallfilespage');
    }

    function userreqstats() //go to manage request page
    {
        return view('user.userreqstatpage');
    }

    function userfloorplan() //go to manage request page
    {
        return view('user.userfloorplanpage');
    }

    function userhelp() //go to all users page
    {
        return view('user.userhelppage');
    }
}
