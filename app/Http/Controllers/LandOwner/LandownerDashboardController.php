<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandownerDashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('landowner');

    }

    public function index(){

        $is_approve = Auth::user()->is_approve;

        return view('landowner.landowner-dashboard')
            ->with('is_approve', $is_approve);
    }



}
