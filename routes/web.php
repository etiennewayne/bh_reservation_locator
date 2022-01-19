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







//LANDOWNER
Route::resource('/landowner-dashboard', App\Http\Controllers\LandOwner\LandownerDashboardController::class);

Route::resource('/boarding-house', App\Http\Controllers\LandOwner\LandownerBoardingHouseController::class);
Route::get('/get-bhouses', [App\Http\Controllers\LandOwner\LandownerBoardingHouseController::class, 'getBhouses']);



Route::get('/session', function(){
    return Session::all();
});
