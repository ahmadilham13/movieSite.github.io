<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
// SweetAlert
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::id();

        $detail_profile = Profile::where('users_id', $id_user)->first();

        return view('profile.index', ['detailProfile' => $detail_profile]);
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
            'umur' => 'required',
            'alamat' => 'required',
            'bio' => 'required'
        ]);
        
        $profile = Profile::find($id);
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->bio = $request->bio;

        $profile->save();

        Alert::success('Berhasil', 'Data Profile Berhasil di Update');

        return redirect('/profile');
    }
}
