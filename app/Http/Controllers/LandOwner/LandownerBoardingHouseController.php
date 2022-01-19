<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class LandownerBoardingHouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('landowner');

    }

    public function index(){
        return view('landowner.boarding-house');
    }


    public function getBhouses(Request $req){
        return BoardingHouse::where('bhouse_name', 'like', $req->bhousename . '%')
            ->orderBy('bhouse_id', 'desc')
            ->get();
    }



}
