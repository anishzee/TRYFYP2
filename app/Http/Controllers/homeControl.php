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

    public function redirectFunct()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $typeuser = $user->usertype;

            if ($typeuser == '1') {
                return view('admin.adminpage')->with('name', $user->name);
            } else {
                return view('user.userpage')->with('name', $user->name);
            }
        } else {
            // User is not authenticated, handle accordingly (e.g., redirect to login page)
            return redirect('/login');
        }
    }


    

}
