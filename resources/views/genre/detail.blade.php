@extends('layout.master')

@section('judul')
Film
@endsection

@section('content')
<button class="btn btn-primary" onclick="history.go(-1);">Back</button>
<div class="container">
    <div class="row justify-content-center">
        @if($films->count())
            @foreach ($films as $film)
            <div class="col-lg-3 mb-3 d-flex">
                <div class="card mx-3" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->judul }}</h5>
                        <p class="card-text">{{ $film->tahun }}</p>
                        <a href="/film/{{ $film->id }}" class="btn btn-primary">Detail Film</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-lg-3 mb-3 text-center">
                <p>Film Tidak Ada</p>
            </div>
        @endif
    </div>
</div>
@endsection