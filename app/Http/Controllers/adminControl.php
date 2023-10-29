<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminControl extends Controller
{
    //
    public function user() //go to all users page
    {
        $data=User::all();
        return view("ADMIN.allusers",['data'=>$data]);
    }

    function deleteit($id)
    {
        DB::delete('delete from users where id=?',[$id]);

        return redirect('/allusers');
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

    function uploadfiles() //go to manage request page
    {
        return view('ADMIN.uploadfilespage');
    }

    
}
