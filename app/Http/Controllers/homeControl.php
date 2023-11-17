<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeControl extends Controller
{
    function index()
    {
        return view('home');
    }

    function redirectfunct() //go to either admin or user page when login 
    {
        $typeuser=Auth::user()->usertype; //capture usertype from DB (0 = user, 1 = admin)

        if($typeuser=='1')
        {
            return view('admin.adminpage'); //the admin view
        }
        
        else
        {
            return view('user.userpage'); //the normal user view
        }
        
    }

}
