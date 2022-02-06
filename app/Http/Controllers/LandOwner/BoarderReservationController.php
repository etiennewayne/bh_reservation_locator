<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\Boarder;
use App\Models\BookBedSpace;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoarderReservationController extends Controller
{
    //
    public function __construct(){


        $this->middleware('auth');
        $this->middleware('landowner');
    }




    public function index(){
        $userid = Auth::user()->user_id;


        $data = DB::table('book_bedspaces as a')
            ->join('bedspaces as b', 'a.bedspace_id', 'b.bedspace_id')
            ->join('rooms as c', 'b.room_id', 'c.room_id')
            ->join('boarding_houses as d', 'c.bhouse_id', 'd.bhouse_id')
            ->join('users as e', 'a.book_user_id', 'e.user_id')
            ->select('a.book_bedspace_id', 'a.bedspace_id', 'a.book_user_id', 'a.book_date', 'a.rental_price', 'a.is_active', 'a.proof_transaction',
                'a.approval_status', 'b.room_id', 'c.bhouse_id', 'b.bedspace_name',
                'b.bedspace_desc', 'b.price', 'b.is_booked', 'c.room_no', 'c.room_desc', 'e.lname', 'e.fname', 'e.mname', 'e.user_id', 'e.role')
                ->where('d.user_id', $userid)
                ->get();

        return view('landowner.boarder-reservation')
            ->with('data', $data);
    }

    public function getBoarderReservation(Request $req){

        $sort = explode('.', $req->sort_by);
        $userid = Auth::user()->user_id;

        $data = DB::table('book_bedspaces as a')
            ->join('bedspaces as b', 'a.bedspace_id', 'b.bedspace_id')
            ->join('rooms as c', 'b.room_id', 'c.room_id')
            ->join('boarding_houses as d', 'c.bhouse_id', 'd.bhouse_id')
            ->join('users as e', 'a.book_user_id', 'e.user_id')
            ->select('a.book_bedspace_id', 'a.bedspace_id', 'a.book_user_id', 'a.book_date', 'a.rental_price', 'a.is_active', 'a.proof_transaction',
                'a.approval_status', 'b.room_id', 'c.bhouse_id', 'b.bedspace_name',
                'b.bedspace_desc', 'b.price', 'b.is_booked', 'c.room_no', 'c.room_desc', 'e.lname', 'e.fname', 'e.mname', 'e.user_id', 'e.role')
            ->where('d.user_id', $userid)
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function approvedReservation($book_bedspace_id){



        $data = BookBedSpace::find($book_bedspace_id);
        $data->approval_status = 'APPROVED';
        $data->save();

        $ndate = date('Y-m-d');

        $qr_code = substr(md5(time() . $data->book_user_id), -8);

//        Payment::create([
//            'book_bedspace_id' => $data->book_bedspace_id,
//            'payment_qr_ref' => $qr_code,
//            'payment_price' => $data->rental_price,
//            'payment_date' => $ndate,
//        ]); //replace with boarder list

        Boarder::updateOrCreate(['boarder_user_id' => $data->book_user_id, 'bedspace_id' => $data->bedspace_id],
            [
                'qr_ref' => $qr_code,
                'boarder_user_id' => $data->book_user_id,
                'bedspace_id' => $data->bedspace_id,
                'rental_price' => $data->rental_price,
                'date_acceptance' => $ndate,
            ]
        );

        return response()->json([
            'status' => 'approved'
        ],200);
    }


}
