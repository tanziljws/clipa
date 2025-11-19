@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Edit Galeri</h1>
    <form action="{{ route('galeri.update',$data->id_galeri) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $data->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            <img src="{{ secure_asset('uploads/'.$data->gambar) }}" width="100" class="mt-2">
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}" {{ $data->id_kategori==$k->id_kategori?'selected':'' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Upload</label>
            <input type="date" name="tanggal_upload" class="form-control" value="{{ $data->tanggal_upload }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
