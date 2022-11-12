@extends('layout.master')
@section('judul')
    Detail Profile
@endsection

@section('content')
    <form action="/profile/{{ $detailProfile->id }}" method="POST">
    @csrf
    @method('put')
    {{-- name --}}
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="umur" class="form-control" value="{{ $detailProfile->user->name }}" disabled>
    </div>
    {{-- email --}}
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="umur" class="form-control" value="{{ $detailProfile->user->email }}" disabled>
    </div>
    {{-- Umur --}}
    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" class="form-control" value="{{ $detailProfile->umur }}">
    </div>
    @error('umur')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Alamat --}}
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $detailProfile->alamat }}</textarea>
    </div>
    @error('alamat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Bio --}}
    <div class="form-group">
        <label>Biodata</label>
        <textarea name="bio" class="form-control" cols="30" rows="10">{{ $detailProfile->bio }}</textarea>
    </div>
    @error('bio')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection