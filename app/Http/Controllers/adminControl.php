<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\documentinfo;
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

    function uploadfilesDB(Request $req) //receive data from form to DB
    {
        $newdoc = new documentinfo;

        $newdoc->DocName=$req->docname;
        $newdoc->DocDate=$req->docdate;
        $newdoc->Location=$req->location;
        $newdoc->LastUsed=$req->lastused;
        $newdoc->DocUpload=$req->document;
        $newdoc->save();

        return redirect('/allfiles');

    }

    public function allfilesdisplay() //go to all files page
    {
        $data=documentinfo::all();
        return view("ADMIN.allfilespage",['data'=>$data]);
    }

    function deletedoc($DocID) //delete doc in DB
    {
        DB::delete('delete from documentinfos where DocID=?',[$DocID]);

        return redirect('/allfiles');
    }

    function viewdocumentinfo($getid) //show the original records
    {
        $data=documentinfo::find($getid); //to capture one set of data in a table//

        return view("ADMIN.viewfiles",['data'=>$data]); //go to form page to insert updates
    }
    



    
}
