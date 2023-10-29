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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/",[homeControl::class,"index"]);

Route::get("/redirect",[homeControl::class,"redirectFunct"]);

Route::get("/allusers",[adminControl::class,"user"]);
Route::get("/del/{id}",[adminControl::class,"deleteit"]); //delete lecturer info
Route::get("/allfiles",[adminControl::class,"displayallfiles"]);
Route::get("/managereq",[adminControl::class,"displaymanagereq"]);
Route::get("/floorplan",[adminControl::class,"displayfloorplan"]);

Route::get("/allfilesUser",[userControl::class,"userallfiles"]);
Route::get("/reqstatsUser",[userControl::class,"userreqstats"]);
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
