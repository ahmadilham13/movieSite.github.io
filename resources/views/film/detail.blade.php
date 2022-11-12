@extends('layout.master')

@section('judul')
Detail Film {{ $film->judul }}
@endsection
@section('content')
    <button class="btn btn-primary" onclick="history.go(-1);">Back</button>
    <h1>{{ $film->judul }}</h1>
    <p>Genre : <span class="badge badge-warning">{{ $film->genre->nama }}</span></p>
    <p>Tahun : {{ $film->tahun }}</p>
    <div class="text-center">
        <img src="{{ asset('storage/' . $film->poster) }}" class="img-fluid" style="width: 300px" alt="">
        <p style="text-align: justify">{{ $film->ringkasan }}</p>
    </div>
    <div class="mt-3">
        <h3>Pemeran</h3>
        <div class="d-flex m-3">
          @foreach ($peran as $item)
          <a href="/cast/{{ $item->cast->id }}">
          <div class="m-2">
              <img src="{{ asset('storage/' . $item->cast->image) }}" class="rounded-circle mb-2" style="width: 50px; margin-left: 10px; height: 50px" alt="...">
              <p>{{ $item->cast->nama }}</p>
          </div>
        </a>
          @endforeach
        </div>
    </div>
    @auth        
        <hr>
        {{-- modal button --}}
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addperan">Tambah Pemeran</button>
        {{-- Modal Start --}}
        <div class="modal fade" id="addperan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemeran</h1>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="/peran" method="POST">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <label>Cast</label>
                    <select name="cast_id" class="form-control">
                      <option value="">-- Silakan Pilih --</option>
                        @foreach ($cast as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <label>Watak Peran</label>
                    <input type="text" name="nama" class="form-control">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Tambah">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        {{-- Modela End --}}
    @endauth    
    <hr>
    <h3>Komentar</h3>
    <hr>
    <div>
        @foreach ($film->kritik as $item)
            <div class="media border p-2">
                <h5 class="mr-3 ctext-info">{{ $item->point }}&#11088;</h5>
                <div class="media-body">
                    <h5 class="mt-0">{{ $item->user->name }}</h5>
                    <p>{{ $item->content }}</p>
                </div>
                @if ($item->user->id === Auth::id())
                <form action="/kritik/{{ $item->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
                @endif
            </div>
        @endforeach
    </div>
    <hr>
    @auth
    {{-- modal button --}}
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#komentar">Add Comment</button>
     {{-- Modal Start --}}
     <div class="modal fade" id="komentar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Komentar</h1>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/kritik" method="POST"> 
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <div class="form-group">
                        <select name="point" class="form-control" id="">
                            <option value="">-- Pilih Penilaian --</option>
                            <option value="1">&#11088;</option>
                            <option value="2">&#11088;&#11088;</option>
                            <option value="3">&#11088;&#11088;&#11088;</option>
                            <option value="4">&#11088;&#11088;&#11088;&#11088;</option>
                            <option value="5">&#11088;&#11088;&#11088;&#11088;&#11088;</option>
                        </select>
                    </div>
                    @error('point')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Isi Pesan...."></textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <hr>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Kirim">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    {{-- Modela End --}}
    @endauth
@endsection