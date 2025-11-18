@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Edit Informasi</h1>
    <form action="{{ route('informasi.update',$data->id_info) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $data->deskripsi }}</textarea>
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
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
            @if(!empty($data->gambar))
                <div class="mt-2">
                    <small class="text-muted d-block">Gambar saat ini:</small>
                    <img src="{{ asset('uploads/'.$data->gambar) }}" alt="{{ $data->judul }}" style="width:140px; height: 100px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,.1);">
                </div>
            @endif
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('informasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
