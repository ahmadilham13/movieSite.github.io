<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeranController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'film_id' => 'required',
            'cast_id' => 'required',
            'nama' => 'required'
        ]);
        Peran::create($validatedData);
    Alert("Berhasil","Peran Berhasil ditambah");
    return redirect('/film/' . $request->film_id);
    }
}
