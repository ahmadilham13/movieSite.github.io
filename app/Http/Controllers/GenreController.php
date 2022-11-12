<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
// SweetAlert
use RealRashid\SweetAlert\Facades\Alert;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genre::all();
        return view('genre.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required'
        ]);

        $genres = new Genre;
        $genres->nama = $request->nama;
        $genres->save();

        Alert::success('Berhasil', 'Data Genre Berhasil Ditambah');

        return redirect('/genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::where('genre_id', $id)->get();
        return view('genre.detail', [
            'films' => $film
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('genre.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $genre = Genre::find($id);
        $genre->nama = $request['nama'];
        $genre->save();

        Alert::success('Berhasil', 'Data Genre Berhasil Diperbarui');

        return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        Alert::success('Berhasil', 'Data Cast Berhasil Dihapus');

        return redirect('/genre');
    }
}
