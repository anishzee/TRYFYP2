<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\adminControl;
use App\Http\Controllers\userControl;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::get("/",[homeControl::class,"index"]);//home page

Route::get("/redirect",[homeControl::class,"redirectFunct"]);//1st page

/*Route::get("/docinfo",[homeControl::class,"getRecentlyOpenedDocuments"]); //to be check -> dummy */

Route::get("/allusers",[adminControl::class,"user"]);//display all users
Route::get("/del/{id}",[adminControl::class,"deleteit"]); //delete users info

Route::get("/floorplan",[adminControl::class,"displayfloorplan"]); //go to floorplan page 
Route::get("/floorplandummy",[adminControl::class,"displayfloorplandummy"]);//dummy floorplan


//---------------------------------------- VIEW UPLOAD DOCUMENTS ---------------------------------------------------

Route::get("/uploadfiles",[adminControl::class,"uploadfiles"]); //upload doc button
Route::post("/addDocument",[adminControl::class,"uploadfilesDB"]); //add data to DB

//---------------------------------------- VIEW ALL DOCUMENTS ---------------------------------------------------

Route::get("/allfiles",[adminControl::class,"allfilesdisplay"]); //display all files
Route::get("/deleteDoc/{DocID}",[adminControl::class,"deletedoc"]); //delete document
Route::get("/download/{file}",[adminControl::class,'download']); //download doc
Route::get("/allfiles/search", [adminControl::class, 'searchFiles']); //search doc

//---------------------------------------- VIEW SPECIFIC DOCUMENT ---------------------------------------------------

Route::get("/documentinfo/{DocID}",[adminControl::class,"viewdocumentinfo"]); //view each document info

//---------------------------------------- UPDATE DOCUMENTS ---------------------------------------------------


Route::get("/updDoc/{DocID}",[adminControl::class,"showData"]); //show data in form 
Route::post("/edit",[adminControl::class,"updatedoc"]); //post update document to DB


//---------------------------------------- ADD TO FAV DOCUMENTS ---------------------------------------------------

Route::post('/addfav/{DocID}', [adminControl::class, 'addToFavorites'])->name('addfav');
Route::get('/favorites', [adminControl::class, 'showFavorites'])->name('favorites');
Route::get('/removeFav/{doc_id}', [AdminControl::class, 'removeFav'])->name('removeFav');


//---------------------------------------- REQUEST DOCUMENTS ---------------------------------------------------


Route::get("/managereq",[adminControl::class,"displaymanagereq"]);
Route::get("/updReq/{DocID}",[AdminControl::class,"updateRequests"])->name('updReqUser'); //show data in form 



//---------------------------------------- END OF ADMIN  ---------------------------------------------------



/*
|--------------------------------------------------------------------------
| USERS ROUTES
|--------------------------------------------------------------------------
*/

//---------------------------------------- VIEW ALL DOCUMENTS ---------------------------------------------------

Route::get("/allfilesUser",[userControl::class,"userallfiles"]);
Route::get("/downloadUser/{file}",[userControl::class,'downloaduser']); //download doc
Route::get("/allfilesUser/search", [userControl::class, 'searchFilesuser']); //search doc

Route::get("/documentinfoUser/{DocID}",[userControl::class,"viewdocumentinfouser"]); //view each document info


//---------------------------------------- UPDATE DOCUMENTS ---------------------------------------------------


Route::get("/updDocUser/{DocID}",[userControl::class,"showData"]); //show data in form 
Route::post("/editUser",[userControl::class,"updatedoc"]); //post update document to DB


//---------------------------------------- REQUEST DOCUMENT ------------------------------------------------------------


Route::post('/reqdoc/{DocID}', [userControl::class, 'addToRequests'])->name('reqdoc');
Route::get('/reqstatsUser', [userControl::class, 'showRequests'])->name('reqstatsUser');
Route::get('/removeReq/{doc_id}', [userControl::class, 'removeReq'])->name('removeReq');


//---------------------------------------- VIEW UPLOAD DOCUMENTS ---------------------------------------------------


Route::get("/uploadfilesUser",[userControl::class,"uploadfilesUser"]); //upload doc button
Route::post("/addDocumentUser",[userControl::class,"uploadfilesDBUser"]); //add data to DB


//---------------------------------------- TO EDIT ------------------------------------------------------------


Route::get("/floorplanUser",[userControl::class,"userfloorplan"]);
Route::get("/helpUser",[userControl::class,"userhelp"]);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
