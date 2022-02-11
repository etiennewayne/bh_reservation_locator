<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoarderPaymentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('landowner');
    }

    public function index(){
        return view('landowner.boarder-payment');
    }

    public function getBoarderPayment(Request $req){
        $data = DB::table('payment_details as a')
            ->join('boarders as b',  'a.boarder_id', 'b.boarder_id')
            ->join('users as c', 'b.boarder_user_id', 'c.user_id')
            ->join('bedspaces as d', 'b.bedspace_id','d.bedspace_id')
            ->join('boarding_houses as e', 'd.bhouse_id','e.bhouse_id')
            ->orderBy('a.payment_detail_id', 'desc')
            ->where('c.lname', 'like', $req->lname . '%')
            ->where('d.bedspace_name', 'like', $req->bedspace . '%')
            ->get();

        return $data;
    }

    public function markPaid($id){

        $data = PaymentDetail::find($id);
        $data->payment_status = 'PAID';
        $data->save();

        return response()->json([
            'status' => 'paid'
        ]);
    }

    public function getReceiptInfo($id){

        $data = DB::table('payment_details as a')
            ->join('boarders as b',  'a.boarder_id', 'b.boarder_id')
            ->join('users as c', 'b.boarder_user_id', 'c.user_id')
            ->join('bedspaces as d', 'b.bedspace_id','d.bedspace_id')
            ->join('boarding_houses as e', 'd.bhouse_id','e.bhouse_id')
            ->leftJoin('provinces as f', 'c.province','f.provCode')
            ->leftJoin('cities as g', 'c.city','g.citymunCode')
            ->leftJoin('barangays as h', 'c.barangay','h.brgyCode')
            ->where('a.payment_detail_id', $id)
            ->get();

        //return $data;
        $dateNow = date('Y-m-d');

        return view('landowner.receipt-payment')->with('data', $data[0])
            ->with('dateNow', $dateNow);
    }


}