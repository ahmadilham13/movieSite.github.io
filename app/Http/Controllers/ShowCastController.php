<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class ShowCastController extends Controller
{
    public function index() {
        return view('page.showCast', [
            'casts' => Cast::all()
        ]);
    }
}
