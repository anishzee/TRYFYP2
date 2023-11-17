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
    //---------------------------------------- VIEW REGISTERED USER ---------------------------------------------------

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


    //---------------------------------------- UPLOAD NEW DOCUMENT ---------------------------------------------------

    function uploadfiles() //redirect to the form page
    {
        return view('ADMIN.uploadfilespage');
    }

    function uploadfilesDB(Request $req) //upload data from form to DB
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

    //---------------------------------------- VIEW ALL DOCUMENTS ---------------------------------------------------

    public function allfilesdisplay() //go to all files page
    {
        $data=documentinfo::paginate(2);
        return view("ADMIN.allfilespage",['data'=>$data]);
    }

    function deletedoc($DocID) //delete doc in DB
    {
        DB::delete('delete from documentinfos where DocID=?',[$DocID]);

        return redirect('/allfiles');
    }

    public function download(Request $request,$DocUpload)
   {

   	    return response()->download(public_path('assets/AllDocuments/'.$DocUpload));
   }

    public function searchFiles(Request $request)
   {
       $searchTerm = $request->input('search');
       $data = documentinfo::where('DocName', 'like', '%' . $searchTerm . '%')
           ->orWhere('Location', 'like', '%' . $searchTerm . '%')
           ->paginate(2);
   
       return view("ADMIN.allfilespage", ['data' => $data]);
   }


    //---------------------------------------- UPDATE FILES ---------------------------------------------------


    function showData($DocID) //show the original records
    {
        $data=documentinfo::find($DocID); //to capture one set of data in a table//

        return view("ADMIN.updateFiles",['disp'=>$data]); //go to form page to insert updates
    }

    function updatedoc(Request $req) //update doc in DB
    {
        
        $data=documentinfo::find($req->DocID);

        $data->DocName=$req->DocName;
        $data->DocDate=$req->DocDate;
        $data->Location=$req->Location;
        $data->LastUsed=$req->LastUsed;
        $data->status=$req->status;

        $data->save();

        return redirect('/allfiles');
    }


    //---------------------------------------- VIEW DOCUMENT ---------------------------------------------------


    function viewdocumentinfo($getid) //show the original records
    {
        $data=documentinfo::find($getid); //to capture one set of data in a table//

        return view("ADMIN.viewfiles",['data'=>$data]); 
    }
    

    //---------------------------------------- TO EDIT LATER ---------------------------------------------------

    function displaymanagereq() //go to manage request page
    {
        return view('ADMIN.managereqpage');
    }

    function displayfloorplan() //go to manage request page
    {
        return view('ADMIN.floorplanpage');
    }
    



    
}
