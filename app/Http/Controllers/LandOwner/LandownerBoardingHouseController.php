<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


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
            'business_permit_imgpath' => ['required', 'mimes:jpg,png,bmp', 'file', 'max:700'],
            'bhouse_img_path' => ['required', 'mimes:jpg,png,bmp', 'file', 'max:700'],
            'long' => ['required'],
            'lat' => ['required'],
        ], $message = [
            'bhouse_img_path.size' => 'Size must atleast 700 kb',
            'business_permit_imgpath.size' => 'Size must atleast 700 kb',

            'bhouse_img_path.mimes' => 'Boarding house must be an image.',
            'business_permit_imgpath.mimes' => 'Business permit must be an image.',
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
            $pathFile = $bhouseImg->store('public/bhouse'); //get path of the file
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
        ], 200);
    }








    public function destroy($id){
        
        $data = BoardingHouse::find($id);
    

        if($data != '' || $data != null){
            if(Storage::exists('public/bpermit/'. $data->business_permit_imgpath)){
                Storage::delete('public/bpermit/'. $data->business_permit_imgpath);
            }

            if(Storage::exists('public/bhouse/'. $data->bhouse_img_path)){
                Storage::delete('public/bhouse/'. $data->bhouse_img_path);
            }
        }

        //$data = BoardingHouse::destroy($id);


    //    $bedspaces = BedSpace::where('bhouse_id', $id)->get();

    //    foreach ($bedspaces as $path){
    //        if($path->img_path != '' || $path->img_path != null){
    //             if(Storage::exists('public/q/' .$path->img_path)){
    //                 Storage::delete('public/q/' .$path->img_path);
    //             }
    //        }
    //    }


        return response()->json([
            'status' => 'deleted'
        ]);
    }



}
