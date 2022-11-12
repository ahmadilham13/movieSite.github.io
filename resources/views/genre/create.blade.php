@extends('layout.master')

@section('judul')
  Tambah Data Genre
@endsection
@section('content')
<form action="/genre" method="post">
    @csrf
    <div class="form-group">
      <label>Nama Genre</label>
      <input type="text" name="nama" class="form-control" autofocus>
    </div>
    {{-- error pada nama cast --}}
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection