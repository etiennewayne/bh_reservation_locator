<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandownerDashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('landowner');

    }

    public function index(){
        return view('landowner.landowner-dashboard');
    }



}
