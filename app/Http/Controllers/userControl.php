<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\documentinfo;
use App\Models\docfavorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Session;


class userControl extends Controller
{
    
    //---------------------------------------- VIEW ALL DOCUMENTS ---------------------------------------------------
    
    function userallfiles() //go to all files page
    {

        $data=documentinfo::paginate(5);
        return view("user.userallfilespage",['data'=>$data]);
  
    }

    public function downloaduser(Request $request,$DocUpload)
   {

   	    return response()->download(public_path('assets/AllDocuments/'.$DocUpload));

   }

    public function searchFilesuser(Request $request)
   {
       $searchTerm = $request->input('search');
       $data = documentinfo::where('DocName', 'like', '%' . $searchTerm . '%')
           ->orWhere('Location', 'like', '%' . $searchTerm . '%')
           ->paginate(2);
   
       return view("user.userallfilespage", ['data' => $data]);
   }


    //---------------------------------------- VIEW DOCUMENT ---------------------------------------------------


    function viewdocumentinfouser($getid) //show the original records
    {
        $data=documentinfo::find($getid); //to capture one set of data in a table//

        return view("user.viewfilesuser",['data'=>$data]); 
    }


    //---------------------------------------- UPDATE FILES ---------------------------------------------------


    function showData($DocID) //show the original records
    {
        $data=documentinfo::find($DocID); //to capture one set of data in a table//

        return view("user.updatefilesuser",['disp'=>$data]); //go to form page to insert updates
    }

    function updatedoc(Request $req) //update doc in DB
    {
        
        $data=documentinfo::find($req->DocID);

        $data->DocName=$req->DocName;
        $data->DocDate=$req->DocDate;
        $data->Location=$req->Location;
        $data->LastUsed=$req->LastUsed;

        $data->save();

        Session::flash('success', 'Document updated successfully');

        return redirect('/allfilesUser');
    }


    //---------------------------------------- TO EDIT LATER ---------------------------------------------------


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
