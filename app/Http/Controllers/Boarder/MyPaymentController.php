<?php

namespace App\Http\Controllers\Boarder;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MyPaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('boarder');
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

    public function submitReceipt(Request $req, $payment_detail_id){

        $req->validate([
            'receipt_img' =>  ['required', 'mimes:jpg,png,bmp', 'file', 'max:800'],
        ], $message = [
            'receipt_img.mimes' => 'Your uploaded image must be a file of jpg, png or bmp.',
        ]);


        $img = $req->file('receipt_img');
        if($img){
            $pathFile = $img->store('public/payment_receipt'); //get path of the file
            $n = explode('/', $pathFile); //split into array using /
        }

        $data = PaymentDetail::find($payment_detail_id);

        if(Storage::exists('public/payment_receipt/' .$data->receipt_img)) {
            Storage::delete('public/payment_receipt/' . $data->receipt_img);
        }

        $data->receipt_img = $n[2];
        $data->save();

        return response()->json([
            'status' => 'uploaded'
        ], 200);

    }


}
