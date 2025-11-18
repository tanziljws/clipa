@extends('admin.layout')

@section('title', 'Galeri Publik')

@section('content')
<h3>Galeri Sekolah</h3>
<div class="row">
    @foreach($data as $row)
    <div class="col-md-3 mb-3">
        <div class="card">
            @if($row->foto)
                <img src="{{ asset('storage/'.$row->foto) }}" class="card-img-top" alt="{{ $row->judul }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $row->judul }}</h5>
                <p class="card-text">{{ $row->deskripsi }}</p>
                <small class="text-muted">Kategori: {{ $row->kategori->nama_kategori ?? '-' }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
