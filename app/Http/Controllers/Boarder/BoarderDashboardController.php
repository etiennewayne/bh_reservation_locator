<?php

namespace App\Http\Controllers\Boarder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BoarderDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('boarder.boarder-dashboard');
    }

    public function getUser(){
        if(Auth::user()->role == 'BOARDER'){
            return Auth::user();
        }

        return [];
    }


}
