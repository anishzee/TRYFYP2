<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\documentinfo;
use App\Models\docfavorite;
use App\Models\docrequest;
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


    //---------------------------------------- REQUEST DOCUMENT ---------------------------------------------------


    function userreqstats() //go to manage request page
    {
        return view('user.userreqstatpage');
    }

    public function addToRequests($DocID)
    {
        // Fetch the Documentinfo model based on the document ID
        $docreq = Documentinfo::find($DocID);

        if (!$docreq) {
            // Handle the case where the document is not found
            Session::flash('fail', 'Document not found');
            return redirect('/allfilesUser');
        }

        // Check if the document is not already in requests
        $userId = auth()->id();
        $isRequest = docrequest::where('ReqUserID', $userId)->where('ReqDocID', $docreq->DocID)->exists();

        if (!$isRequest) {
            // Add the document to requests table
            docrequest::create([
                'ReqUserID' => $userId,
                'ReqDocID' => $docreq->DocID,
            ]); 

            Session::flash('success', 'Document requested successfully');
            return redirect('/allfilesUser');
        }

        // Display error message
        Session::flash('fail', 'Failed to request document');
        return redirect('/allfilesUser');
    }

    public function showRequests()
    {
        // Get the current user's ID
        $userId = auth()->id();

        // Query the 'docrequest' table to get the requested document IDs for the user
        $requestedDocumentIds = docrequest::where('ReqUserID', $userId)->pluck('ReqDocID')->toArray();

        // Retrieve the documents based on the IDs from the 'Documentinfo' table
        $userRequested = documentinfo::whereIn('DocID', $requestedDocumentIds)->paginate(2);
        
        return view('user.userreqstatpage', compact('userRequested'));
    }


    public function removeReq($doc_id)
    {
        // Find the requested record based on doc_id and user_id
        $requested = docrequest::where('ReqDocID', $doc_id)
            ->where('ReqUserID', auth()->id())
            ->first();

        // Check if the request record exists
        if ($requested) {
            // Delete the favorite record
            $requested->delete();

            Session::flash('success', 'Document removed from request successfully');

            return redirect('/reqstatsUser');
        }

        // If the requested record doesn't exist
        Session::flash('fail', 'Failed to remove, document did not exist');

        return redirect('/reqstatsUser');
    }
    


    //---------------------------------------- TO EDIT LATER ---------------------------------------------------


    function userfloorplan() //go to manage request page
    {
        return view('user.userfloorplanpage');
    }

    function userhelp() //go to all users page
    {
        return view('user.userhelppage');
    }
}
