@extends('layout.master')

@section('judul')
    Genre
@endsection

@section('content')

@auth
    <a href="/genre/create" class="btn btn-primary btn-sm my-3">Tambah</a>
@endauth
<div class="container">
    <div class="row">
        @foreach ($data as $genre)
            <div class="col-lg-4 mb-3">
                <div class="card mx-3">
                    <img src="{{ asset('img/genre.png') }}" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">{{ $genre->nama }}</p>
                        <div class="row">
                            <div class="col">
                                <a href="/genre/{{ $genre->id }}" class="btn btn-primary col-lg">Detail Gennre</a>
                                @auth
                                    <div class="d-flex mt-2 justify-content-center">
                                        <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning col-lg-5">Edit Genre</a>
                                        <form action="/genre/ {{ $genre->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="submit" onclick="return confirm('Anda Yakin Akan Menghapus ???')" class="btn btn-danger col-lg" value="Delete Genre">
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection