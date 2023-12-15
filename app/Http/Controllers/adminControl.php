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
        $data=User::paginate(3); //can change ikut suka
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

        $newdoc->status = 'Available'; //set value by default = Available 
        $newdoc->reqstatus = 'Pending'; //set value by default = Pending 

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
    
    //---------------------------------------- VIEW FLOORPLAN  ---------------------------------------------------

    
    function displayfloorplan() //go to floorplan page
    {
        return view('ADMIN.floorplanpage');
    }

    function displayfloorplandummy() //go to floorplan page
    {
        return view('ADMIN.favoritedoc'); //try fav doc 
    }
    
    
    //---------------------------------------- FAVOURITE DOCUMENT ---------------------------------------------------

    
    
    public function addToFavorites($DocID)
    {
        // Fetch the Documentinfo model based on the document ID
        $document = Documentinfo::find($DocID);

        if (!$document) {
            // Handle the case where the document is not found
            Session::flash('fail', 'Document not found');
            return redirect('/allfiles');
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
            return redirect('/allfiles');
        }

        // Display error message
        Session::flash('fail', 'Failed to add favorite');
        return redirect('/allfiles');
    }



    public function showFavorites()
    {
        // Get the current user's ID
        $userId = auth()->id();

        // Query the 'docfavorite' table to get the favorite document IDs for the user
        $favoriteDocumentIds = docfavorite::where('user_id', $userId)->pluck('doc_id')->toArray();

        // Retrieve the documents based on the IDs from the 'Documentinfo' table
        $userFavorites = documentinfo::whereIn('DocID', $favoriteDocumentIds)->paginate(2);
        
        return view('admin.favoritedoc', compact('userFavorites'));
    }


    public function removeFav($doc_id)
    {
        // Find the favorite record based on doc_id and user_id
        $favorite = docfavorite::where('doc_id', $doc_id)
            ->where('user_id', auth()->id())
            ->first();

        // Check if the favorite record exists
        if ($favorite) {
            // Delete the favorite record
            $favorite->delete();

            Session::flash('success', 'Document removed from favorite successfully');

            return redirect('/favorites');
        }

        // If the favorite record doesn't exist
        Session::flash('fail', 'Failed to remove, document did not exist');

        return redirect('/favorites');
    }


    //---------------------------------------- REQUEST DOCUMENTS ---------------------------------------------------


    function displaymanagereq() //go to manage request page
    {
        return view('ADMIN.managereqpage');
    }


    //---------------------------------------- TO EDIT LATER ---------------------------------------------------
    
    



    
}
