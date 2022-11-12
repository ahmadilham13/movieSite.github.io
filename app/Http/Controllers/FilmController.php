<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Kritik;
use App\Models\Peran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// SweetAlert
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Film::all();
        return view('film.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cast = Cast::all();
        $genre = Genre::all();
        return view('film.create', [
            'genres' => $genre,
            'casts' => $cast
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'image|file|max:2048',
            'genre_id' => 'required'
        ]);
        // image
        if($request->file('poster')) {
            $validatedData['poster'] = $request->file('poster')->store('film-images');
        }
        Film::create($validatedData);
        Alert::success('Berhasil', 'Data Film Berhasil Ditambah');

        return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);
        $cast = Cast::all();
        $peran = Peran::where('film_id', $id)->get();
        return view('film.detail', [
            'film' => $film,
            'peran' => $peran,
            'cast' => $cast
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
        $film = Film::find($id);
        $genre = Genre::all();
        return view('film.edit', [
            'film' => $film,
            'genres' => $genre]);
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
        $validatedData = $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'image|file|max:2048',
            'genre_id' => 'required'
        ]);

        // image
        if($request->file('poster')) {
            if($request->oldPoster){
                Storage::delete($request->oldPoster);
            }
            $validatedData['poster'] = $request->file('poster')->store('film-images');
        }
        Film::where('id', $id)
                ->update($validatedData);

        Alert::success('Berhasil', 'Data Film Berhasil Diperbarui');

        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $film->delete();

        Alert::success('Berhasil', 'Data Film Berhasil Dihapus');

        return redirect('/film');
    }
}
