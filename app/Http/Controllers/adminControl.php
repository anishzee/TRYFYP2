<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\documentinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;

class adminControl extends Controller
{
    //
    public function user() //go to all users page & display all users data
    {
        $data=User::paginate(2); //can change ikut suka
        return view("ADMIN.allusers",['data'=>$data]);
    }

    function deleteit($id)//delete user
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

        $DocUpload=$req->DocUpload;

	    $filename=time().'.'.$DocUpload->getClientOriginalExtension();
       
        $req->DocUpload->move('assets/AllDocuments',$filename);

		$newdoc->DocUpload=$filename;


        $newdoc->DocName=$req->DocName;
        $newdoc->DocDate=$req->DocDate;
        $newdoc->Location=$req->Location;
        $newdoc->LastUsed=$req->LastUsed;
       
        $newdoc->save();

        return redirect('/allfiles');

    }

    function storeDoc(Request $req) //receive data from form to DB
    {
        $DocUpload=$req->document;
        
        $filename=save();

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
