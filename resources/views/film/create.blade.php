@extends('layout.master')

@section('judul')
    Tambah Data Film
@endsection

@section('content')
<form action="/film" method="post" enctype="multipart/form-data">
    @csrf
    {{-- Judul --}}
    <div class="form-group">
      <label>Judul Film</label>
      <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" autofocus>
    </div>
    {{-- error pada Judul FIlm --}}
    @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Ringkasan --}}
    <div class="form-group">
        <label>Alur Cerita</label>
        <textarea name="ringkasan" class="form-control @error('ringkasan') is-invalid @enderror" cols="100%" rows="5">{{ old('ringkasan') }}</textarea>
    </div>
    {{-- error pada Ringkasan --}}
    @error('ringkasan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Tahun Terbit --}}
    <div class="form-group">
        <label>Tahun Rilis</label>
        <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" min="1900" max="2099" step="1" value="{{ old('tahun') }}">
    </div>
    {{-- error pada Tahun RIlis --}}
    @error('tahun')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Poster --}}
    <div class="form-group">
        <label>Poster</label>
        <img class="img-preview img-fluid mb-3 col-sm-3">
        <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" onchange="previewImage()" value="{{ old('poster') }}">
        @error('poster')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- Genre --}}
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control">
            @foreach ($genres as $genre)
                @if (old('genre_id') == $genre->id)
                    <option value="{{ $genre->id }}" selected>{{ $genre->nama }}</option>
                @else
                    <option value="{{ $genre->id }}">{{ $genre->nama }}</option>          
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection