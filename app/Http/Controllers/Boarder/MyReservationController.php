<?php

namespace App\Http\Controllers\Boarder;

use App\Http\Controllers\Controller;
use App\Models\BookBedSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyReservationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){
        return view('boarder.my-reservation');
    }

    public function getMyReservation(Request $req){
        $sort = explode('.', $req->sort_by);

        $userid = Auth::user()->user_id;
        $data = BookBedSpace::where('book_user_id', $userid)
            ->with(['user', 'bedspace'])
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function uploadProofTransaction(Request $req, $book_bedspace_id){
        $req->validate([
            'proof_transaction' => ['required', 'mimes:jpg,png,bmp', 'max: 800']
        ], $message = [
            'proof_transaction.'
        ]);
        $proofTransaction = $req->file('proof_trans_img');


        if($proofTransaction){
            $pathFile = $proofTransaction->store('public/prooftrans'); //get path of the file
            $proof_transaction = explode('/', $pathFile); //split into array using /
        }

        $data = BookBedSpace::find($$book_bedspace_id);
        $data->proof_transaction = $proof_transaction[2];
        $data->save();

        return response()->json([
            'status' => 'uploaded'
        ]);
    }


}
