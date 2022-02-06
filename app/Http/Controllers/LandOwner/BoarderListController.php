<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoarderListController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('landowner');
    }


    public function index(){

        $userid = Auth::user()->user_id;

        $data = DB::table('boarders as a')
            ->join('bedspaces as b', 'a.bedspace_id', 'b.bedspace_id')
            ->join('rooms as c', 'b.room_id', 'c.room_id')
            ->join('boarding_houses as d', 'c.bhouse_id', 'd.bhouse_id')
            ->join('users as e', 'a.boarder_user_id', 'e.user_id')
            ->select('a.boarder_id', 'a.bedspace_id', 'a.boarder_user_id', 'a.date_acceptance', 'a.rental_price', 'a.is_active',
                'b.room_id', 'c.bhouse_id', 'b.bedspace_name',
                'b.bedspace_desc', 'b.price', 'b.is_booked', 'c.room_no', 'c.room_desc', 'e.lname', 'e.fname', 'e.mname', 'e.user_id', 'e.role')
            ->where('d.user_id', $userid)
            ->get();

        return view('landowner.boarder-list')
            ->with('data', $data);
    }

    public function getBoarderList(Request $req){

        $sort = explode('.', $req->sort_by);
        $userid = Auth::user()->user_id;

        $data = DB::table('boarders as a')
            ->join('bedspaces as b', 'a.bedspace_id', 'b.bedspace_id')
            ->join('rooms as c', 'b.room_id', 'c.room_id')
            ->join('boarding_houses as d', 'c.bhouse_id', 'd.bhouse_id')
            ->join('users as e', 'a.boarder_user_id', 'e.user_id')
            ->select('a.boarder_id', 'a.bedspace_id', 'a.boarder_user_id', 'a.date_acceptance', 'a.rental_price', 'a.is_active',
                'b.room_id', 'c.bhouse_id', 'b.bedspace_name',
                'b.bedspace_desc', 'b.price', 'b.is_booked', 'c.room_no', 'c.room_desc', 'e.lname', 'e.fname', 'e.mname', 'e.user_id', 'e.role')
            ->where('d.user_id', $userid)
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }
}
