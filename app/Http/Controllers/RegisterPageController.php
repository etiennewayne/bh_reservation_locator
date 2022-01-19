<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPageController extends Controller
{
    //
    public function index(){
        return view('register-page');
    }



    function saveBoarder($req){
        $validate = $req->validate([
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'max:30', 'confirmed'],
            'lname' => ['required', 'string', 'max:100'],
            'fname' => ['required', 'string', 'max:100'],

            'email' => ['required', 'string', 'max:100', 'unique:users'],
            'sex' => ['required', 'string', 'max:20'],
            'contact_no' => ['required', 'max:30'],

            'role' => ['required', 'max:30'],

            'guardian_name' => ['required', 'max:100'],
            'guardian_contact_no' => ['required', 'max:100'],
            'guardian_address' => ['required', 'max:100'],

            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'street' => ['required'],
        ]);

        User::create([
            'username' => $req->username,
            'lname' => strtoupper($req->lname),
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'sex' => strtoupper($req->sex),
            'role' => strtoupper($req->role),
            'email' => $req->email,
            'contact_no' => $req->contact_no,

            'guardian_name' => strtoupper($req->guardian_name),
            'guardian_contact_no' => strtoupper($req->guardian_contact_no),
            'guardian_address' => strtoupper($req->guardian_address),

            'province' => strtoupper($req->province),
            'city' => strtoupper($req->city),
            'barangay' => strtoupper($req->barangay),
            'street' => strtoupper($req->street),

            'password' => Hash::make($req->password),
        ]);
    }

    function saveLandOwner($req){
        $validate = $req->validate([
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'max:30', 'confirmed'],
            'lname' => ['required', 'string', 'max:100'],
            'fname' => ['required', 'string', 'max:100'],

            'email' => ['required', 'string', 'max:100', 'unique:users'],
            'sex' => ['required', 'string', 'max:20'],
            'contact_no' => ['required', 'max:30'],

            'role' => ['required', 'max:30'],

            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'street' => ['required'],
        ]);

        User::create([
            'username' => $req->username,
            'lname' => strtoupper($req->lname),
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'sex' => strtoupper($req->sex),
            'role' => strtoupper($req->role),
            'email' => $req->email,
            'contact_no' => $req->contact_no,
            'province' => strtoupper($req->province),
            'city' => strtoupper($req->city),
            'barangay' => strtoupper($req->barangay),
            'street' => strtoupper($req->street),
            'password' => Hash::make($req->password),
        ]);
    }
    public function store(Request $req){

        if($req->role == 'BOARDER'){
            $this->saveBoarder($req);
        }else{
            $this->saveLandOwner($req);
        }


        return response()->json([
            'status' => 'saved'
        ],200);

    }
}
