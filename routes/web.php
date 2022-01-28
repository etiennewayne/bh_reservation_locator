<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
]);

Route::middleware('guest')->get('/gate', function () {
    //this route will check and redirect user
});





Route::get('/sample',[App\Http\Controllers\SampleController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/register', App\Http\Controllers\RegisterPageController::class);





//ADDRESS
Route::get('/load-provinces', [App\Http\Controllers\AddressController::class, 'loadProvinces']);
Route::get('/load-cities', [App\Http\Controllers\AddressController::class, 'loadCities']);
Route::get('/load-barangays', [App\Http\Controllers\AddressController::class, 'loadBarangays']);




//ADMINSITRATOR
Route::resource('/dashboard', App\Http\Controllers\Administrator\AdminDashboardController::class);

Route::resource('/users', App\Http\Controllers\Administrator\UserController::class);
Route::get('/get-users', [App\Http\Controllers\Administrator\UserController::class, 'getUsers']);


//ROUTE FOR REQUEST BHOUSE // KANANG MAG PA APPROVE SA BHOUSE E DISPLAY
// ANG BUSINESS PERMIT
Route::resource('/bh-request', App\Http\Controllers\Administrator\BHRequestController::class);
Route::get('/get-bh-requests', [App\Http\Controllers\Administrator\BHRequestController::class, 'getBHRequests']);
Route::post('/bh-request-approved/{id}', [App\Http\Controllers\Administrator\BHRequestController::class, 'approveBh']);
Route::post('bh-request-deactivate/{id}', [App\Http\Controllers\Administrator\BHRequestController::class, 'deactivateBh']);
//---------------------------//
//---------------------------//





//LANDOWNER
Route::resource('/landowner-dashboard', App\Http\Controllers\LandOwner\LandownerDashboardController::class);


//BOARDING HOUSE
Route::resource('/boarding-house', App\Http\Controllers\LandOwner\LandownerBoardingHouseController::class);
Route::get('/get-bhouses', [App\Http\Controllers\LandOwner\LandownerBoardingHouseController::class, 'getBhouses']);
//-------------------------///


//BOARDING HOUSE ROOMS
Route::get('/boarding-house-rooms/{id}', [App\Http\Controllers\LandOwner\LandOwnerRoomController::class, 'index']);
Route::post('/boarding-house-rooms/{id}', [App\Http\Controllers\LandOwner\LandOwnerRoomController::class, 'store']);

Route::get('/get-boarding-house-rooms/{id}', [App\Http\Controllers\LandOwner\LandOwnerRoomController::class, 'getRooms']);
//-------------------------///


//BOARDING HOUSE - BEDSPACE
Route::get('/boarding-house-bedspace/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'index']);
Route::get('/get-boarding-house-bedspaces/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'showBedSpace']);

Route::post('/boarding-house-bedspace/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'store']);
//Route::get('/get-boarding-house-bedspaces-imgs/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'getBedspaceImgs']);
Route::put('/boarding-house-bedspace-update/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'update']);

Route::get('/get-bhouse-bedspaces/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'getBhBedspaces']);
Route::delete('/boarding-house-bedspace-delete/{id}', [App\Http\Controllers\LandOwner\LandownerBedspaceController::class, 'destroy']);





//-------------------------///




//CLIENT BOARDING HOUSES //
Route::get('/get-client-bhouses', [App\Http\Controllers\ClientBhouseController::class, 'getBhouses']);
Route::get('/client-bhouse-detail/{id}', [App\Http\Controllers\ClientBhouseController::class, 'showBhouseDetail']);




Route::get('/session', function(){
    return Session::all();
});
