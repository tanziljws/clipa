<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Kategori;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::with('kategori');

        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('id_kategori', $request->kategori);
        }

        $data = $query->orderBy('tanggal_upload', 'desc')->get();
        $kategori = Kategori::all();
        $counts = Galeri::selectRaw('id_kategori, COUNT(*) as total')
            ->groupBy('id_kategori')
            ->pluck('total','id_kategori');
        $totalAll = Galeri::count();

        return view('admin.galeri.index', compact('data', 'kategori','counts','totalAll'));
    }

    public function publicIndex(Request $request)
    {
        $query = Galeri::with(['kategori', 'likes', 'comments'])->orderBy('tanggal_upload', 'desc');
        
        // Filter by category
        if ($request->has('kategori') && $request->kategori != 'all') {
            $query->where('id_kategori', $request->kategori);
        }
        
        // Search by title
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        
        $data = $query->paginate(12)->withQueryString();
        $kategori = Kategori::all();
        
        return view('frontend.galeri', compact('data', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.galeri.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|array',
            'gambar.*' => 'required|image|max:10240', // Max 10MB per file
            'id_kategori' => 'required',
            'tanggal_upload' => 'required|date',
        ]);

        $uploadedFiles = [];
        
        // Handle multiple file uploads
        foreach ($request->file('gambar') as $file) {
            $namaFile = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $uploadedFiles[] = $namaFile;
        }

        // Create multiple galeri entries for each uploaded file
        foreach ($uploadedFiles as $fileName) {
            Galeri::create([
                'judul' => $request->judul,
                'gambar' => $fileName,
                'id_kategori' => $request->id_kategori,
                'tanggal_upload' => $request->tanggal_upload,
            ]);
        }

        $count = count($uploadedFiles);
        return redirect()->route('galeri.index')->with('success', "Berhasil menambahkan {$count} foto ke galeri!");
    }

    public function edit($id)
    {
        $data = Galeri::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.galeri.edit', compact('data','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required',
            'tanggal_upload' => 'required|date',
            'gambar' => 'image|nullable',
        ]);

        $data = Galeri::findOrFail($id);

        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data->gambar = $namaFile;
        }

        $data->judul = $request->judul;
        $data->id_kategori = $request->id_kategori;
        $data->tanggal_upload = $request->tanggal_upload;
        $data->save();

        return redirect()->route('galeri.index')->with('success','Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Galeri::findOrFail($id);
        if(file_exists(public_path('uploads/'.$data->gambar))){
            unlink(public_path('uploads/'.$data->gambar));
        }
        $data->delete();

        return redirect()->route('galeri.index')->with('success','Galeri berhasil dihapus');
    }
}
