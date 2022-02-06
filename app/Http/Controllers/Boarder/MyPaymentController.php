<?php

namespace App\Http\Controllers\Boarder;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyPaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){
        return view('boarder.my-payment');
    }


    public function getMyPayment(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = DB::table('payment_details as a')
            ->join('boarders as b', 'a.boarder_id', 'b.boarder_id')
            ->join('users as c', 'b.boarder_user_id', 'c.user_id')
            ->join('bedspaces as d', 'b.bedspace_id', 'd.bedspace_id')
            ->join('rooms as e', 'd.room_id', 'e.room_id')
            ->join('boarding_houses as f', 'e.bhouse_id', 'f.bhouse_id')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }



}
