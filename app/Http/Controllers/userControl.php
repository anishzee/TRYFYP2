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
           ->paginate(50);
   
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
        $docreq = documentinfo::find($DocID);

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

            // Update the status in Documentinfo table to "In Used" so other user cannot request the same document. 
            $docreq->update([
                'status' => 'In Used',
            ]);

            Session::flash('success', 'Document requested successfully');
            return redirect('/allfilesUser');
        }else {

            // Handle the case where the document is already in requests
            Session::flash('fail', 'Document is already in requests');
            return redirect('/allfilesUser');
        }
    }

    public function showRequests()
    {
        // Get the current user's ID
        $userId = auth()->id();

        // Query the 'docrequest' table to get the user's requested ReqID and document information
        $userRequested = docrequest::where('ReqUserID', $userId)
            ->join('documentinfos', 'docrequests.ReqDocID', '=', 'documentinfos.DocID')
            ->select('documentinfos.*', 'docrequests.*', 'docrequests.ReqStatus as ReqStatus')
            ->paginate(2);

        return view('user.userreqstatpage', compact('userRequested'));
    }



    public function removeReq($req_id)
    {
        // Find the requested record based on doc_id and user_id
        $requested = docrequest::where('ReqID', $req_id)
            ->where('ReqUserID', auth()->id())
            ->first();

        // Check if the request record exists
        if ($requested) {
            // Get the associated documentinfo
            $documentinfo = DB::table('documentinfos')->where('DocID', $requested->ReqDocID)->first();

            // Check if the associated documentinfo exists
            if ($documentinfo) {
                // Update the status in the documentinfo table to "Available"
                DB::table('documentinfos')->where('DocID', $requested->ReqDocID)->update(['status' => 'Available']);
            }

            // Delete the request record
            $requested->delete();

            Session::flash('success', 'Document removed from request successfully');
            return redirect('/reqstatsUser');
        }

        // If the requested record doesn't exist
        Session::flash('fail', 'Failed to remove, document did not exist');

        return redirect('/reqstatsUser');
    }

    
    
    //---------------------------------------- UPLOAD DOCUMENTS ---------------------------------------------------

    function uploadfilesUser() //redirect to the form page
    {
        return view('User.uploadfilesUser');
    }


    function uploadfilesDBUser(Request $req) //upload data from form to DB
    {
        $req->validate([
            'DocName' => 'required|unique:documentinfos', // Check uniqueness against the documentinfos table
            'DocUpload' => 'required|file|mimes:pdf', // Add validation rules for file upload
        ]);

        // Check if a document with the same name already exists
        if (documentinfo::where('DocName', $req->DocName)->exists()) {
            Session::flash('fail', 'Failed to add, document existed');
            return redirect()->back();
        }

        // Check if the location has reached its limit
        $locationLimit = 3; // Set the limit for the number of files per location
        $fileCount = documentinfo::where('Location', $req->Location)->count();

        if ($fileCount >= $locationLimit) {
            Session::flash('fail', 'Failed to add, location has reached its limit');
            return redirect()->back();
        }
        
        $newdoc = new documentinfo;

        $newdoc->status = 'Available'; //set value by default = Available 
        $newdoc->reqstatus = 'Pending'; //set value by default = Pending (dummy yang ni dah pindah kat ReqStatus) 

        $DocUpload=$req->file('DocUpload');

	    $uniqueIdentifier = time() . '_' . uniqid();
       
        $combinedFilename = $DocUpload->getClientOriginalName() . '_' . $uniqueIdentifier . '.' . $DocUpload->getClientOriginalExtension();

        $DocUpload->move('assets/AllDocuments',$combinedFilename);

		$newdoc->DocUpload=$combinedFilename;

        $newdoc->DocName=$req->DocName;
        $newdoc->DocDate=$req->DocDate;
        $newdoc->Location=$req->Location;
        $newdoc->LastUsed=$req->LastUsed;
       
        $newdoc->save();

        Session::flash('success', 'Document uploaded successfully');

        return redirect('/uploadfilesUser');

    }



    //---------------------------------------- VIEW FLOORPLAN  ---------------------------------------------------


    function displayfloorplandummyUser() //go to floorplan page on navbar
    {
        return view('user.userfloorplanpage'); 
    }

    function userfloorplan() //go to floorplan when click button
    {
        $selectedLocation = request()->route('location');
        \Log::info('Selected Location: ' . $selectedLocation); // Log the selected location
        return view('user.floorplanSpecific', compact('selectedLocation'));
    }


    //---------------------------------------- TO EDIT LATER ---------------------------------------------------


    function userhelp() //go to all users page
    {
        return view('user.userhelppage');
    }


    //---------------------------------------- FAVOURITE DOCUMENT ---------------------------------------------------

    
    
    public function addToFavoritesUser($DocID) //add to fav button
    {
        // Fetch the Documentinfo model based on the document ID
        $document = Documentinfo::find($DocID);

        if (!$document) {
            // Handle the case where the document is not found
            Session::flash('fail', 'Document not found');
            return redirect('/allfilesUser');
        }

        // Check if the document is not already in favorites
        $userId = auth()->id();
        $isFavorite = docfavorite::where('user_id', $userId)->where('doc_id', $document->DocID)->exists();

        if (!$isFavorite) {
            // Add the document to favorites
            docfavorite::create([
                'user_id' => $userId,
                'doc_id' => $document->DocID,
            ]); 

            Session::flash('success', 'Document added to favorite successfully');
            return redirect('/allfilesUser');
        }

        // Display error message
        Session::flash('fail', 'Failed to add favorite, Document already added to favorite');
        return redirect('/allfilesUser');
    }


    public function showFavoritesUser()
    {
        // Get the current user's ID
        $userId = auth()->id();

            // Query the 'docfavorites' table to get the user's favorite document IDs and FavID
        $userFavorites = docfavorite::where('user_id', $userId)
        ->join('documentinfos', 'docfavorites.doc_id', '=', 'documentinfos.DocID')
        ->select('documentinfos.*', 'docfavorites.FavID')
        ->paginate(2);
        
        return view('user.favoritedocUser', compact('userFavorites'));
    }


    public function removeFavUser($doc_id)
    {
        // Find the favorite record based on doc_id and user_id
        $favorite = docfavorite::where('FavID', $doc_id)
            ->where('user_id', auth()->id())
            ->first();

        // Check if the favorite record exists
        if ($favorite) {
            // Delete the favorite record
            $favorite->delete();

            Session::flash('success', 'Document removed from favorite successfully');

            return redirect('/favoritesUser');
        }

        // If the favorite record doesn't exist
        Session::flash('fail', 'Failed to remove, document did not exist');

        return redirect('/favoritesUser');
    }

}
