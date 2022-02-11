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

    public function show($id){
        
        return BoardingHouse::find($id);
    }


    public function getBhouses(Request $req){
        $id = Auth::user()->user_id;
        
        return BoardingHouse::where('user_id', $id)
            ->where('bhouse_name', 'like', $req->bhousename . '%')
            ->orderBy('bhouse_id', 'desc')
            ->get();
    }

    public function create(){
        return view('landowner.boarding-house-create');
    }

    public function store(Request $req){
       

        $validate = $req->validate([
            'bhouse_name' => ['required', 'string', 'max: 100'],
            'bhouse_rule' => ['required'],
            'long' => ['required'],
            'lat' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'street' => ['required'],
        ]);


        $userid = Auth::user()->user_id;
        
        BoardingHouse::create([
            'bhouse_name' => strtoupper($req->bhouse_name),
            'user_id' => $userid,
            'bhouse_rule' => $req->bhouse_rule,
            'bhouse_desc' => $req->bhouse_desc,
            'long' => $req->long,
            'lat' => $req->lat,
            'province' => strtoupper($req->province),
            'city' => strtoupper($req->city),
            'barangay' => strtoupper($req->barangay),
            'street' => strtoupper($req->street),
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }


    public function edit($id){
        $bhouse = BoardingHouse::find($id);
        return view('landowner.boarding-house-create')
            ->with('bhouse', $bhouse)
            ->with('id', $id);
    }

    public function update(Request $req, $id){
        $validate = $req->validate([
            'bhouse_name' => ['required', 'string', 'max: 100'],
            'bhouse_rule' => ['required', 'string'],
            'long' => ['required'],
            'lat' => ['required'],
        ]);


        $data = BoardingHouse::find($id);
        $data->bhouse_name = strtoupper($req->bhouse_name);
        $data->bhouse_rule = strtoupper($req->bhouse_rule);
        $data->bhouse_desc = strtoupper($req->bhouse_desc);
        $data->long = strtoupper($req->long);
        $data->lat = strtoupper($req->lat);

        $data->province = strtoupper($req->province);
        $data->city = strtoupper($req->city);
        $data->barangay = strtoupper($req->barangay);
        $data->street = strtoupper($req->street);
        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }



    public function destroy($id){
        
        // $data = BoardingHouse::find($id);
        // if($data != '' || $data != null){
        //     if(Storage::exists('public/bpermit/'. $data->business_permit_imgpath)){
        //         Storage::delete('public/bpermit/'. $data->business_permit_imgpath);
        //     }

        //     if(Storage::exists('public/bhouse/'. $data->bhouse_img_path)){
        //         Storage::delete('public/bhouse/'. $data->bhouse_img_path);
        //     }
        // }

        $data = BoardingHouse::destroy($id);


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
