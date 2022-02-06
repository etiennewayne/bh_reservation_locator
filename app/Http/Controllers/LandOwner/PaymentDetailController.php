<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class PaymentDetailController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('landowner');
    }


    public function store(Request $req){

        $date =  $req->npayment_date;
        $ndate = date("Y-m-d", strtotime($date));

        PaymentDetail::updateOrCreate([
            'date_pay' => $ndate,
            'boarder_id' => $req->boarder_id,
        ],[
            'boarder_id' => $req->boarder_id,
            'payment_to_pay' => $req->amount_to_pay,
            'date_pay' => $ndate,
            'payment_status' => 'UNPAID'
        ]);


        return response()->json([
            'status' => 'saved'
        ],200);
    }


}
