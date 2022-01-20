<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BedSpace;
use App\Models\BedspaceImg;



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
    



    public function store(Request $req, $id){

        return $req;

        // $validate = $req->validate([
        //     'bedspace_name' => ['required'],
        //     'bedspace_desc' => ['required'],
        //     'bedspace_img_path' => ['required', 'mimes:jpg,bmp,png', 'max:700']

        // ], $message = [
        //     'bedspace_img_path.mimes' => 'Image must be a jpeg, png or bmp.',
        //     'bedspace_img_path.max' => 'Image size must be atleast 700kb each.',

        // ]);

        $bedspace = BedSpace::create([
            'bhouse_id' => $id,
            'bedspace_name' => $req->bedspace_name,
            'bedspace_desc' => $req->bedspace_desc,
            'price' => $req->price,
            'is_booked' => 0
        ]);

        $bedspace_id = $bedspace->bedspace_id;

        $bedspacesImg = $req->file('bedspace_img_path');

        if($bedspacesImg){
            foreach($req->file('bedspace_img_path') as $image){
                $pathFile = $bedspacesImg->store('public/bedspaces'); //get path of the file
                $n = explode('/', $pathFile); //split into array using /


                //insert into database after upload 1 image
                BedspaceImg::create([
                    'bedspace_id' => $bedspace_id,
                    'bedspace_img_path' => $pathFile

                ]);
            }
        }

    }




}
