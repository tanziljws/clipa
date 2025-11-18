<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Kategori;

class InformasiController extends Controller
{
    public function publicIndex(Request $request)
    {
        $kategori = Kategori::all();

        $query = Informasi::with('kategori')->orderBy('tanggal','desc');
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('id_kategori', $request->kategori);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('judul','like',"%$s%")
                  ->orWhere('deskripsi','like',"%$s%");
            });
        }
        $informasi = $query->paginate(9)->withQueryString();

        return view('frontend.informasi', compact('informasi','kategori'));
    }
    public function index(Request $request)
    {
        $query = Informasi::with('kategori');
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('id_kategori', $request->kategori);
        }
        $data = $query->orderBy('tanggal', 'desc')->get();
        $kategori = Kategori::all();
        $counts = Informasi::selectRaw('id_kategori, COUNT(*) as total')
            ->groupBy('id_kategori')
            ->pluck('total','id_kategori');
        $totalAll = Informasi::count();

        return view('admin.informasi.index', compact('data','kategori','counts','totalAll'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.informasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $data = $request->only('judul','deskripsi','id_kategori','tanggal');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time().'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        Informasi::create($data);

        return redirect()->route('informasi.index')->with('success','Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Informasi::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.informasi.edit', compact('data','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $data = Informasi::findOrFail($id);

        $payload = $request->only('judul','deskripsi','id_kategori','tanggal');

        if ($request->hasFile('gambar')) {
            // delete old
            if ($data->gambar && file_exists(public_path('uploads/'.$data->gambar))) {
                @unlink(public_path('uploads/'.$data->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time().'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $payload['gambar'] = $namaFile;
        }

        $data->update($payload);

        return redirect()->route('informasi.index')->with('success','Informasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Informasi::findOrFail($id);
        if ($data->gambar && file_exists(public_path('uploads/'.$data->gambar))) {
            @unlink(public_path('uploads/'.$data->gambar));
        }
        $data->delete();

        return redirect()->route('informasi.index')->with('success','Informasi berhasil dihapus');
    }
}
