@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Data Informasi</h1>
    <a href="{{ route('informasi.create') }}" class="btn btn-primary mb-3">Tambah Informasi</a>

    <!-- Category Bar -->
    <div class="category-bar mb-4">
        <a class="cat-pill {{ !request('kategori') || request('kategori')==='all' ? 'active' : '' }}" href="{{ route('informasi.index') }}">
            <i class="fas fa-layer-group"></i>
            <span>Semua</span>
            <span class="cat-count">{{ $totalAll ?? 0 }}</span>
        </a>
        @isset($kategori)
            @foreach($kategori as $k)
                @php $cnt = $counts[$k->id_kategori] ?? 0; @endphp
                <a class="cat-pill {{ request('kategori') == $k->id_kategori ? 'active' : '' }}" href="{{ route('informasi.index', ['kategori' => $k->id_kategori]) }}">
                    <i class="fas fa-tag"></i>
                    <span>{{ $k->nama_kategori }}</span>
                    <span class="cat-count">{{ $cnt }}</span>
                </a>
            @endforeach
        @endisset
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-modern w-100">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td class="cell-title">{{ $item->judul }}</td>
                <td>
                    @if(!empty($item->gambar))
                        <img src="{{ secure_asset('uploads/'.$item->gambar) }}" class="thumb" alt="{{ $item->judul }}">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ Str::limit($item->deskripsi, 120) }}</td>
                <td>
                    @if(isset($item->kategori))
                        <span class="badge-category">{{ $item->kategori->nama_kategori }}</span>
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <a href="{{ route('informasi.edit',$item->id_info) }}" class="btn btn-soft-warning btn-sm">Edit</a>
                    <a href="{{ route('informasi.destroy',$item->id_info) }}" class="btn btn-soft-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <style>
    .category-bar { display:flex; flex-wrap:wrap; gap:10px; }
    .cat-pill { display:inline-flex; align-items:center; gap:10px; padding:10px 14px; border:2px solid #e5e7eb; border-radius:999px; background:#fff; color:#0a3d62; text-decoration:none; font-weight:600; transition:.2s; box-shadow:0 2px 8px rgba(0,0,0,.05); }
    .cat-pill i { color: var(--primary-color); }
    .cat-pill .cat-count { background:rgba(15,76,117,.08); color:#0f4c75; border:1px solid rgba(15,76,117,.2); border-radius:999px; padding:2px 8px; font-size:.85rem; font-weight:700; }
    .cat-pill:hover { border-color: var(--primary-color); transform: translateY(-2px); box-shadow:0 8px 18px rgba(15,76,117,.15); }
    .cat-pill.active { background: var(--primary-color); color:#fff; border-color: var(--primary-color); box-shadow:0 6px 14px rgba(15,76,117,.25); }
    .cat-pill.active i, .cat-pill.active .cat-count { color:#fff; border-color:rgba(255,255,255,.35); background:rgba(255,255,255,.18); }
    </style>
</div>
@endsection
