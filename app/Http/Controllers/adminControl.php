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


class adminControl extends Controller
{
    //---------------------------------------- VIEW REGISTERED USER ---------------------------------------------------

    public function user() //go to all users page & display all users data
    {
      
        $data = User::where('usertype', '0')
        ->paginate(3);

        return view("ADMIN.allusers",['data'=>$data]);
    }

    // public function deleteit($id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         // Delete records from docfavorites where user_id = $id
    //         DB::delete('delete from docfavorites where user_id = ?', [$id]);

    //         // Delete records from docrequests where ReqUserID = $id
    //         DB::delete('delete from docrequests where ReqUserID = ?', [$id]);

    //         // Finally, delete the user from the 'users' table
    //         DB::delete('delete from users where id = ?', [$id]);

    //         // Commit the transaction
    //         DB::commit();

    //         Session::flash('success', 'User and related records deleted successfully');

    //         return redirect('/allusers');
    //     } catch (\Exception $e) {
    //         // An error occurred, rollback the transaction
    //         DB::rollBack();

    //         Session::flash('error', 'Error deleting user and related records');

    //         return redirect('/allusers');
    //     }
    // }

    public function deleteit($id)
    {
        DB::beginTransaction();

        try {
            // Check if ReqID exists in docrequests table
            $reqIDExists = DB::table('docrequests')->where('ReqUserID', $id)->exists();

            // If ReqID exists, update documentinfo table
            if ($reqIDExists) {
                // Update status to 'Available' for matching DocID
                $reqDocID = DB::table('docrequests')->where('ReqUserID', $id)->value('ReqDocID');
                DB::table('documentinfos')->where('DocID', $reqDocID)->update(['status' => 'Available']);
            }

            // Delete records from docfavorites where user_id = $id
            DB::table('docfavorites')->where('user_id', $id)->delete();

            // Delete records from docrequests where ReqUserID = $id
            DB::table('docrequests')->where('ReqUserID', $id)->delete();

            // Finally, delete the user from the 'users' table
            DB::table('users')->where('id', $id)->delete();

            // Commit the transaction
            DB::commit();

            Session::flash('success', 'User and related records deleted successfully');

            return redirect('/allusers');

        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();

            Session::flash('fail', 'Error deleting user and related records');

            return redirect('/allusers');
        }
    }



    //---------------------------------------- SEARCH USERLIST ---------------------------------------------------
    

    public function searchUser(Request $request)
   {
       $searchTerm = $request->input('search');
       $data = User::where(function ($query) use ($searchTerm) {
        $query->where('name', 'like', '%' . $searchTerm . '%')
              ->where('usertype', '0');
        })
        ->orWhere(function ($query) use ($searchTerm) {
            $query->where('email', 'like', '%' . $searchTerm . '%')
                ->where('usertype', '0');
        })
        ->paginate(3);
           
       return view("ADMIN.allusers", ['data' => $data]);
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

        $DocUpload=$req->DocUpload;

	    $uniqueIdentifier = time() . '_' . uniqid();
       
        $combinedFilename = $DocUpload->getClientOriginalName() . '_' . $uniqueIdentifier . '.' . 
        $DocUpload->getClientOriginalExtension();

        $req->DocUpload->move('assets/AllDocuments',$combinedFilename);

		$newdoc->DocUpload=$combinedFilename;

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
        // Delete related records in docrequests table first
        DB::delete('delete from docrequests where ReqDocID = ?', [$DocID]);

        // Delete related records in docfavorites table first
        DB::delete('delete from docfavorites where doc_id = ?', [$DocID]);

        // Now, delete the document from documentinfos table
        DB::delete('delete from documentinfos where DocID = ?', [$DocID]);

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
           ->paginate(3);
   
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

        $data->save();

        Session::flash('success', 'Document updated successfully');

        return redirect('/allfiles');
    }


    //---------------------------------------- VIEW DOCUMENT ---------------------------------------------------


    function viewdocumentinfo($getid) //show specific the orignal records
    {
        $data=documentinfo::find($getid); //to capture one set of data in a table//

        return view("ADMIN.viewfiles",['data'=>$data]); 
    }
    
    //---------------------------------------- VIEW FLOORPLAN  ---------------------------------------------------

    
    function displayfloorplan() //go to floorplan page when click location button
    {
        $selectedLocation = request()->route('location');
        \Log::info('Selected Location: ' . $selectedLocation); // Log the selected location

        return view('ADMIN.floorplanpage', compact('selectedLocation'));
    }

    function displayfloorplandummy() //go to floorplan page
    {
        return view('ADMIN.dummyfloor'); 
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
        Session::flash('fail', 'Document already added to favorite');
        return redirect('/allfiles');
    }



    public function showFavorites()
    {
         // Get the current user's ID
        $userId = auth()->id();

            // Query the 'docfavorites' table to get the user's favorite document IDs and FavID
        $userFavorites = docfavorite::where('user_id', $userId)
        ->join('documentinfos', 'docfavorites.doc_id', '=', 'documentinfos.DocID')
        ->select('documentinfos.*', 'docfavorites.FavID')
        ->paginate(2);
     
        return view('ADMIN.favoritedoc', compact('userFavorites'));
    }




    public function removeFav($doc_id)
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


    public function showRequestsAdmin()
    {

        // Query the 'docrequest' table to get the requested document IDs for the user
        // Retrieve the documents based on the IDs from the 'Documentinfo' table
        $userRequested = documentinfo::join('docrequests', 'documentinfos.DocID', '=', 'docrequests.ReqDocID')
            ->join('users', 'users.id', '=', 'docrequests.ReqUserID')   
            ->select('documentinfos.*', 'docrequests.*', 'docrequests.ReqStatus as ReqStatus', 'users.name as UserName')
            ->paginate(2);

        return view('ADMIN.managereqpage', compact('userRequested'));

        
    }


    public function removeReqAdmin($req_id)
    {
        // Find the requested record based on req_id
        $requested = docrequest::find($req_id);

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
            return redirect('/reqstatsAdmin');
        }

        // If the requested record doesn't exist
        Session::flash('fail', 'Failed to remove, document request did not exist');
        return redirect('/reqstatsAdmin');
    }


    public function updateStatus(Request $request,$id )// value from form ReqID
    {
        
        $data = docrequest::find($id); //find the ReqID
        
        $data->ReqStatus = $request->status; //save the value 


        $data->save();

        // Find the associated documentinfo
        $documentinfo = DB::table('documentinfos')->where('DocID', $data->ReqDocID)->first(); //get data from DB terus, bcs we dont use HasMany in model 

        if ($documentinfo) {
            // Update the status in the documentinfo table
            if ($request->status === 'Accepted' || $request->status === 'accepted' ||
                 $request->status === 'Pending' || $request->status === 'pending' || 
                 $request->status === 'Rejected' || $request->status === 'rejected') {
                $status = 'In Used';
            } elseif ($request->status === 'Done' || $request->status === 'done') {
                $status = 'Available';
            } else {
                // Handle other cases if needed
                $status = '';
            }
    
            // Update the status in the documentinfo table
            DB::table('documentinfos')->where('DocID', $data->ReqDocID)->update(['status' => $status]);
        }

        // Redirect back or to a specific page after the update
        Session::flash('success', 'Status updated successfully');
        return redirect('/reqstatsAdmin');
      
    }

    

    //---------------------------------------- TO EDIT LATER ---------------------------------------------------

    
}
