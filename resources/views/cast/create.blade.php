@extends('layout.master')

@section('judul')
  Tambah Data Cast
@endsection
@section('content')
<form action="/cast" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Nama Cast</label>
      <input type="text" name="nama" class="form-control" autofocus>
    </div>
    {{-- error pada nama cast --}}
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Umur</label>
      <input type="number" name="umur" class="form-control">
    </div>
    {{-- error pada umur --}}
    @error('umur')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Bio</label>
      <textarea name="bio" cols="30" rows="10" class="form-control"></textarea>
    </div>
    {{-- error pada bio --}}
    @error('bio')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-3">
      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="poster" onchange="previewImage()" value="{{ old('image') }}">
    </div>
    {{-- error pada umur --}}
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection