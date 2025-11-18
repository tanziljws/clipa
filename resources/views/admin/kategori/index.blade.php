@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Data Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-modern w-100">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td class="cell-title">{{ $item->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit',$item->id_kategori) }}" class="btn btn-soft-warning btn-sm">Edit</a>
                    <a href="{{ route('kategori.destroy',$item->id_kategori) }}" class="btn btn-soft-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
