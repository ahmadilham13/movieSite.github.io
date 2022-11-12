@extends('layout.master')

@section('judul')
    Data Cast
@endsection
@section('content')
<h1>Cast</h1>
@auth
    <a href="/cast/create" class="btn btn-primary btn-sm my-3">Tambah</a>
@endauth

<div class="container">
    <div class="row">
        @foreach ($data as $cast)
            <div class="col-lg-4 mb-3 d-flex">
                 <div class="card mx-3">
                    <div class="text-center">
                     <img src="{{ asset('storage/' . $cast->image) }}" width="300px" height="300px">
                    </div>
                     <div class="card-body">
                         <h5 class="card-title">{{ $cast->nama }}</h5>
                         <h6 class="card-text">{{ $cast->umur }}</h6>
                         <p class="card-text">{{ Str::limit($cast->bio, 60) }}</p>
                         <div class="col">
                             <a href="/cast/{{ $cast->id }}" class="btn btn-primary col-lg">Detail Cast</a>
                             @auth
                             <div class="d-flex mt-2 justify-content-center">
                                 <a href="/cast/{{ $cast->id }}/edit" class="btn btn-warning col-lg-5">Edit Cast</a>
                                <form action="/cast/ {{ $cast->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" onclick="return confirm('Anda Yakin Akan Menghapus ???')" class="btn btn-danger col-lg" value="Delete Cast">
                                </form>
                                </div>
                                @endauth
                            </div>
                    </div>
                </div>   
            </div>
        @endforeach
    </div>
</div>
@endsection