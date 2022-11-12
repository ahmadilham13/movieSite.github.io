<?php

namespace App\Http\Controllers;

use App\Models\Kritik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KritikController extends Controller
{
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'point' => 'required',
            'content' => 'required'
        ]);

        $kritik = new Kritik;
        $kritik->point = $request->point;
        $kritik->content = $request->content;

        $kritik->film_id = $request->film_id;
        $kritik->users_id = Auth::id();

        $kritik->save();

        Alert::success('Berhasil', 'Berhasil memberikan komentar');

        return redirect('/film/' . $request->film_id);
    }
    public function destroy(Request $request, $kritik_id)
    {
        $kritik = Kritik::find($kritik_id);
        $kritik->delete();

        Alert::success('Berhasil', 'Komentar Berhasil Dihapus');

        return redirect('/film/' . $request->film_id);
    }
}
