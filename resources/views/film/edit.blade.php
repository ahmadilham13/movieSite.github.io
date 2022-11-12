@extends('layout.master')

@section('judul')
    Edit Data Film
@endsection

@section('content')
<form action="/film/{{ $film->id }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    {{-- Judul --}}
    <div class="form-group">
      <label>Judul Film</label>
      <input type="text" name="judul" class="form-control" value="{{ $film->judul }}" autofocus>
    </div>
    {{-- error pada Judul FIlm --}}
    @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Ringkasan --}}
    <div class="form-group">
        <label>Alur Cerita</label>
        <textarea name="ringkasan" class="form-control" cols="100%" rows="5">{{ $film->ringkasan }}</textarea>
    </div>
    {{-- error pada Ringkasan --}}
    @error('ringkasan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Tahun Terbit --}}
    <div class="form-group">
        <label>Tahun Rilis</label>
        <input type="number" name="tahun" class="form-control" min="1900" max="2099" step="1" value="{{ $film->tahun }}" value="{{ $film->tahun }}">
    </div>
    {{-- error pada Tahun RIlis --}}
    @error('tahun')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Poster --}}
    <div class="form-group">
        <label>Poster</label>
        @if ($film->poster)
            <img src="{{ asset('storage/' . $film->poster) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @endif
        <input type="hidden" name="oldPoster" value="{{ $film->poster }}">
        <input type="file" class="form-control @error('poster') is-invalid @enderror" onchange="previewImage()" id="poster" name="poster" value="{{ $film->poster }}">
    </div>
    {{-- error pada Poster --}}
    @error('poster')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- Genre --}}
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control">
            @foreach ($genres as $genre)
                @if (old('genre_id', $film->genre_id) == $genre->id)
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