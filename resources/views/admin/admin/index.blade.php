@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Kelola Akun</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-modern w-100">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="cell-title">{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <span class="text-muted">
                        <i class="fas fa-lock"></i> Terenkripsi
                    </span>
                    <small class="d-block text-muted" style="font-size: 0.75rem;">
                        (Password dienkripsi untuk keamanan)
                    </small>
                </td>
                <td>
                    <a href="{{ route('admin.manage.edit', $item->id) }}" class="btn btn-soft-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    @if($item->id != auth()->id())
                        <a href="{{ route('admin.manage.destroy', $item->id) }}" 
                           class="btn btn-soft-danger btn-sm" 
                           onclick="return confirm('Yakin hapus admin ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled title="Tidak dapat menghapus akun sendiri">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

