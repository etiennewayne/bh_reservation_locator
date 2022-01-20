<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

use Auth;

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

    public function create(){
        return view('landowner.boarding-house-create');
    }

    public function store(Request $req){

        $validate = $req->validate([
            'bhouse_name' => ['required', 'string', 'max: 100'],
            'owner' => ['required', 'string', 'max: 100'],
            'business_permit_imgpath' => ['required', 'mimes:jpg,png,bmp', 'file|size:700'],
            'bhouse_img_path' => ['required', 'mimes:jpg,png,bmp', 'file|size:700'],
            'long' => ['required'],
            'lat' => ['required'],
        ], $message = [
            'bhouse_img_path.size' => 'Size must atleast 700 kb',
            'business_permit_imgpath.size' => 'Size must atleast 700 kb',
        ]);

        //upload image b permit
        $bPermitImg = $req->file('business_permit_imgpath');
        if($bPermitImg){
            $pathFile = $bPermitImg->store('public/bpermit'); //get path of the file
            $n = explode('/', $pathFile); //split into array using /
        }

        //upload image b house
        $bhouseImg = $req->file('bhouse_img_path');
        if($bhouseImg){
            $pathFile = $bPermitImg->store('public/bhouse'); //get path of the file
            $bhouse_imgpath = explode('/', $pathFile); //split into array using /
        }


        $userid = Auth::user()->user_id;
        
        BoardingHouse::create([
            'bhouse_name' => strtoupper($req->bhouse_name),
            'user_id' => $userid,
            'owner' => strtoupper($req->owner),
            'business_permit_imgpath' => $n[2] != null ? $n[2]: '',
            'bhouse_img_path' => $bhouse_imgpath[2] != null ? $bhouse_imgpath[2]: '',
            'long' => $req->long,
            'lat' => $req->lat
        ]);

        
        return response()->json([
            'status' => 'saved'
        ], 422);;
    }



}
