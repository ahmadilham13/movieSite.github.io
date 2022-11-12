@extends('layout.master')

@section('judul')
Film
@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach ($casts as $cast) 
        <div class="col-lg-4 mb-3 d-flex">
            <div class="card mx-3">
                <img src="{{ asset('storage/' . $cast->image) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $cast->nama }}</h5>
                    <h6 class="card-text">{{ $cast->umur }}</h6>
                    <p class="card-text">{{ Str::limit($cast->bio, 60) }}</p>
                    <a href="/showFilm/{{ $cast->id }}" class="btn btn-primary">Detail Film</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection