<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\BoardingHouse;

class ClientBhouseController extends Controller
{
    //

    public function __construct(){

    }



    public function getBhouses(Request $req){
        $bhousename = $req->bhousename;


        $data = DB::table('boarding_houses as a')
            ->where('a.bhouse_name', 'like', $bhousename .'%')
            ->get();
        return $data;
    }


    public function showBhouseDetail($id){
        $data = BoardingHouse::find($id);

        return view('client-bhouse-detail')
            ->with('data', $data)
            ->with('id', $id);
    }
}
