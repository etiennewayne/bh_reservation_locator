<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandOwnerRoomController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('landowner');
    }


    public function index($id){
        return view('landowner.room.boarding-house-room')
            ->with('id', $id);
    }
}
