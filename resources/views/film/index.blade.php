@extends('layout.master')

@section('judul')
    Film
@endsection

@section('content')

@auth
    <a href="/film/create" class="btn btn-primary btn-sm my-3">Tambah</a>
@endauth

<div class="container">
    @if ($data)
    <div class="row">
        @foreach ($data as $film)
            <div class="col-lg-4 mb-3 d-flex">
                <div class="card mx-3">
                    <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->judul }}</h5>
                        <h6 class="card-text">{{ $film->tahun }}</h6>
                        <span class="badge badge-warning">{{ $film->genre->nama }}</span>
                        <p class="card-text">{{ Str::limit($film->ringkasan, 60) }}</p>
                        <div class="col">
                            <a href="/film/{{ $film->id }}" class="btn btn-primary col-lg">Detail Film</a>
                            @auth
                                <div class="d-flex mt-2 justify-content-center">
                                    <a href="/film/{{ $film->id }}/edit" class="btn btn-warning col-lg-5">Edit Film</a>
                                    <form action="/film/ {{ $film->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" onclick="return confirm('Anda Yakin Akan Menghapus ???')" class="btn btn-danger col-lg" value="Delete Film">
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
        <p>Data Tidak Ada</p>
    @endif
    
</div>
@endsection