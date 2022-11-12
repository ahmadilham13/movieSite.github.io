@extends('layout.master')

@section('judul')
    Detail Kategori
@endsection
@section('content')
<button class="btn btn-primary" onclick="history.go(-1);">Back</button>
<h1>{{ $cast->nama }}</h1>
<p>Umur : {{ $cast->umur }} Tahun</p>
<div class="text-center">
    <img src="{{ asset('storage/' . $cast->image) }}" class="img-fluid" width="300px">
    <p style="text-align: justify">{{ $cast->bio }}</p>
    <h3>Film yang Diperan</h3>
    <div class="d-flex">
        @foreach ($peran as $item)
            <div class="row g-0 g-md-4 mt-2">
                <div class="col">
                    <img src="{{ asset('storage/' . $item->film->poster) }}" class="" width="200px" height="150px">
                    <p>{{ $item->film->judul }}</p>
                    <p>Genre : <span class="badge badge-warning">{{ $item->film->genre->nama }}</span></p>
                    <a href="/film/{{ $item->film->id }}" class="btn btn-primary text-sm'">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection