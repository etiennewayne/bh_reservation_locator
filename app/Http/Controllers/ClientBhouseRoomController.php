<?php

namespace App\Http\Controllers;

use App\Models\BedSpace;
use Illuminate\Http\Request;

use App\Models\Room;


class ClientBhouseRoomController extends Controller
{
    //

    public function index($bhouse_id){
        $rooms = Room::where('bhouse_id', $bhouse_id)
            ->get();

        return view('client-bh-rooms')
            ->with('data', $rooms);
    }


    public function getBhRoomsClient($bhouse_id){
        $rooms = Room::where('bhouse_id', $bhouse_id)
            ->get();

            return $rooms;
    }

    public function getBedSpaces($room_id){
        $bedspaces = BedSpace::where('room_id', $room_id)
            ->with(['imgs'])
            ->where('is_booked', 0)
            ->get();
        return $bedspaces;
    }



}
