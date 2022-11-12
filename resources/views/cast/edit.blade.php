@extends('layout.master')

@section('judul')
  Edit Data Cast
@endsection
@section('content')
<form action="/cast/{{ $cast->id }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="form-group">
      <label>Nama Cast</label>
      <input type="text" name="nama" value="{{ $cast->nama }}" class="form-control" autofocus>
    </div>
    {{-- error pada nama cast --}}
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Umur</label>
      <input type="number" name="umur" value="{{ $cast->umur }}" class="form-control">
    </div>
    {{-- error pada umur --}}
    @error('umur')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Bio</label>
      <textarea name="bio" cols="30" rows="10" class="form-control">{{ $cast->bio }}</textarea>
    </div>
    {{-- error pada bio --}}
    @error('bio')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Image</label>
      @if ($cast->image)
        <img src="{{ asset('storage/' . $cast->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">  
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @endif
      <input type="hidden" value="{{ $cast->image }}" name="oldImage">
      <input type="file" name="image" value="{{ $cast->image }}" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()" id="poster">
    </div>
    {{-- error pada Image --}}
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection