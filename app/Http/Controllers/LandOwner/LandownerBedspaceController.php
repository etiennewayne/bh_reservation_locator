<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BedSpace;
use App\Models\BedspaceImg;
use Illuminate\Support\Facades\DB;
use Auth;

class LandownerBedspaceController extends Controller
{
    //

    public function __construct(){
      

        $this->middleware('auth');
        $this->middleware('landowner');

    }


    public function index($id){
        $bedspaces = BedSpace::where('bhouse_id', $id)->get();
        return view('landowner.bedspace.boarding-house-bedspace')
            ->with('bhouse_id', $id)
            ->with('bedspaces', $bedspaces);
    }

    public function getBedspaceImgs($bhouse_id){

        return DB::table('boarding_houses as a')
            ->join('bedspaces as b', 'a.bhouse_id', 'b.bhouse_id')
            ->join('bedspace_imgs as c', 'b.bedspace_id', 'c.bedspace_id')
            ->where('a.bhouse_id', $bhouse_id)
            ->get();
    }




    public function store(Request $req, $id){


        $req->validate([
            'bedspace_name' => ['required'],
            'bedspace_name' => ['required'],
            'bedspace_img_path.*' => ['required', 'mimes:jpg,bmp,png', 'max:700'],
            'price' => ['required', 'integer'],

        ], $message = [
            'bedspace_img_path.mimes' => 'Image must be a jpeg, png or bmp.',
            'bedspace_img_path.max' => 'Image size must be atleast 700kb each.',

        ]);


        $bedspace = BedSpace::create([
            'bhouse_id' => $id,
            'bedspace_name' => $req->bedspace_name,
            'bedspace_desc' => $req->bedspace_desc,
            'price' => $req->price,
            'is_booked' => 0
        ]);

        $bedspace_id = $bedspace->bedspace_id;

        if($req->hasFile('bedspace_img_path')){
            foreach($req->file('bedspace_img_path') as $image){
                $pathFile = $image->store('public/bedspaces'); //get path of the file
                $n = explode('/', $pathFile); //split into array using /


                //insert into database after upload 1 image
                BedspaceImg::create([
                    'bedspace_id' => $bedspace_id,
                    'bedspace_img_path' => $n[2]

                ]);
            }
        }

        return response()->json([
            'status'=>'saved'
        ],200);

    }

    public function getBhBedspaces(Request $req){
        $id = Auth::user()->user_id;

        return DB::table('bedspaces as a')
            ->join('boarding_houses as b', 'a.bhouse_id', 'b.bhouse_id')
            ->where('b.user_id', $id)
            ->orderBy('bedspace_id', 'desc')
            ->paginate($req->perpage);

    }


    public function destroy($id){
        BedSpace::destroy($id);
        return response()->json([
            'status'=>'deleted'
        ],200);
    }



}
