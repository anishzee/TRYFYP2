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

        Session::flash('success', 'Document uploaded successfully');

        return redirect('/uploadfiles');

    }

    //---------------------------------------- VIEW ALL DOCUMENTS ---------------------------------------------------

    public function allfilesdisplay() //go to all files page
    {
        $data=documentinfo::paginate(5);
        return view("ADMIN.allfilespage",['data'=>$data]);
    }

    function deletedoc($DocID) //delete doc in DB
    {
        DB::delete('delete from documentinfos where DocID=?',[$DocID]);

        Session::flash('success', 'Document deleted successfully');

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

        Session::flash('success', 'Document updated successfully');

        return redirect('/allfiles');
    }


    //---------------------------------------- VIEW DOCUMENT ---------------------------------------------------


    function viewdocumentinfo($getid) //show the original records
    {
        $data=documentinfo::find($getid); //to capture one set of data in a table//

        return view("ADMIN.viewfiles",['data'=>$data]); 
    }
    
    //---------------------------------------- VIEW DOCUMENT ---------------------------------------------------

    
    function displayfloorplan() //go to floorplan page
    {
        return view('ADMIN.floorplanpage');
    }

    function displayfloorplandummy() //go to floorplan page
    {
        return view('ADMIN.favoritedoc');
    }
    
    
    //---------------------------------------- FAVOURITE DOCUMENT ---------------------------------------------------

    
    public function addToFavorites($document)
    {
        $documentModel = documentinfo::findOrFail($document);

        // Attach the document to the user's favorites >> function from user model
        auth()->user()->favorites()->create(['doc_id' => $documentModel->DocID]);

        Session::flash('success', 'Document added to favorites successfully');

        return redirect('/allfiles');
    }


    public function showFavorites()
    {
        // Debugging statement
        //dd('Controller is called'); // Check if the user is authenticated

        // Retrieve the user's favorite documents
        $userFavorites = auth()->user()->favorites()->with('document')->get();

        // Debugging statement
        //dd($userFavorites); // Check the content of $userFavorites

        return view('admin.favoritedoc', compact('userFavorites'));
    }


    //---------------------------------------- TO EDIT LATER ---------------------------------------------------

    function displaymanagereq() //go to manage request page
    {
        return view('ADMIN.managereqpage');
    }

    
    



    
}
