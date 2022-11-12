<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function inputForm() {
        return view('page.inputForm');
    }
    public function send(Request $request){
        // dd($request->all());
        $firstName      = $request['firstName'];
        $lastName       = $request['lastName'];
        $gender         = $request['gender'];
        $nasionality    = $request['nasionality'];
        $spoken         = $request['spoken'];
        $bio            = $request['spoken'];

        return view('page.home', ['firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender, 'nasionality' => $nasionality, 'spoken' => $spoken, 'bio' => $bio]);
    }
    public function dataTables() {
        return view('page.dataTables');
    }
}
