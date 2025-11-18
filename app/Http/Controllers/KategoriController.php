<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::create($request->only('nama_kategori'));
        return redirect()->route('kategori.index')->with('success','Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_kategori'=>'required']);
        $data = Kategori::findOrFail($id);
        $data->nama_kategori = $request->nama_kategori;
        $data->save();

        return redirect()->route('kategori.index')->with('success','Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();

        return redirect()->route('kategori.index')->with('success','Kategori berhasil dihapus');
    }
}
