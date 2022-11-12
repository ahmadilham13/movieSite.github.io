<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Film;
use App\Models\Peran;
use Illuminate\Support\Facades\Storage;
// SweetAlert
use RealRashid\SweetAlert\Facades\Alert;


class CastController extends Controller
{
    public function index()
    {
        $data = Cast::all();
        return view('cast.index', ['data' => $data]);
    }
    public function create()
    {
        return view('cast.create');
    }
    public function store(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
            'image' => 'image|file|max:2048'
        ]);
        // image
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('cast-images');
        }

        Cast::create($validatedData);
        Alert::success('Berhasil', 'Data Cast Berhasil Ditambah');
        
        return redirect('/cast');
    }
    public function show($cast_id)
    {
        $cast = Cast::find($cast_id);
        $peran = Peran::where('cast_id', $cast_id)->get();
        return view('cast.detail', [
            'cast' => $cast,
            'peran' => $peran
        ]);
    }
    public function edit($cast_id)
    {
        $cast = Cast::find($cast_id);

        return view('cast.edit', ['cast' => $cast]);
    }
    public function update(Request $request, $cast_id)
    {
        // validasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
            'image' => 'image|file|max:2048'
        ]);
        // image
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('cast-images');
        }
        Cast::where('id', $cast_id)
                ->update($validatedData);

        Alert::success('Berhasil', 'Data Cast Berhasil Diperbarui');

        return redirect('/cast');
    }
    public function destroy($cast_id)
    {
        $cast = Cast::find($cast_id);
        $cast->delete();

        Alert::success('Berhasil', 'Data Cast Berhasil Dihapus');

        return redirect('/cast');
    }
}
