<?php

namespace App\Http\Controllers;

use App\Models\BedSpace;
use App\Models\BookBedSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientReserveBedSpaceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function reserveBedspace($bedspace_id){
        $userid = Auth::user()->user_id;
        $ndate = date('Y-m-d');

        $isExist = BookBedSpace::where('book_user_id',$userid)
            ->where('is_active', 1)
            ->exists();

        if($isExist){
            return response()->json([
                'errors'=> 'active'
            ], 422);
        }


        $bedspace = BedSpace::find($bedspace_id);
        $bedspace->is_booked = 1;
        $bedspace->save();

        BookBedSpace::create([
            'bedspace_id' => $bedspace_id,
            'book_user_id' => $userid,
            'book_date' => $ndate,
            'book_price' => $bedspace->price
        ]);

        return response()->json([
            'status' => 'reserved'
        ]);

    }


}
