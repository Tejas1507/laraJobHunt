<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

//Common Resources Routes:
//index - dhow all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit lisitng
//update - update listing
//destroy - delete listing


/*for all listings
Route::get('/', function () {
    return view('listings', [
        'listings'=> Listing::all()
    ]);
});*/

//for all listings usin controller
Route::get('/', [ListingController::class, 'index']);

/*for single listings WITHOUT ERROR HANDLING
Route::get('/listings/{id}', function($id){
    return view('listing', [
        'listing'=> Listing::find($id)
    ]);
});*/

/*for single lisitng ERROR HANDLING WITH IF ELSE
Route::get('/listing/{id}', function($id){
    $listing=Listing::find($id);
    if($listing){
        return view('listing',[
            'listing'=>$listing
        ]);
    }else{
        abort(404);
    }
        
});*/

/*for single lisitng with ROUTE MODEL BINDNG(ELOQUENT MODEL auto error handling)
Route::get('/listings/{listing}', function(Listing 
    $listing){
    return view('listing', [
        'listing'=>$listing]);
});*/

//show create listing
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//store listing data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//update listing
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');

//manage listings
Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');

//for single listing using controller
Route::get('/listings/{listing}',[ListingController::class, 'show']); 

//show register/create form
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class, 'store']);

//log user out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class, 'authenticate']);

