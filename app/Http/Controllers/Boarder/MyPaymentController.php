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
        $data = DB::table('payments as a')
            ->join('book_bedspaces as b', 'a.book_bedspace_id', 'b.book_bedspace_id')
            ->join('users as c', 'b.book_user_id', 'c.user_id')
            ->join('bedspaces as d', 'b.bedspace_id', 'd.bedspace_id')
            ->get();

        return view('boarder.my-payment')
            ->with('data', $data);
    }


    public function getMyPayment(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = DB::table('payments as a')
            ->join('book_bedspaces as b', 'a.book_bedspace_id', 'b.book_bedspace_id')
            ->join('users as c', 'b.book_user_id', 'c.user_id')
            ->join('bedspaces as d', 'b.bedspace_id', 'd.bedspace_id')
            ->paginate($req->perpage);

        return $data;
    }



}
