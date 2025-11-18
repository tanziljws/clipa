<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriComment;
use App\Models\Galeri;

class GaleriCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'komentar' => 'required|string|max:1000',
        ]);

        $galeri = Galeri::findOrFail($id);

        $comment = GaleriComment::create([
            'id_galeri' => $id,
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar,
            'ip_address' => $request->ip(),
        ]);

        $comment->load('galeri');

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'message' => 'Komentar berhasil ditambahkan'
        ]);
    }

    public function index($id)
    {
        $galeri = Galeri::findOrFail($id);
        $comments = $galeri->comments()->get();

        return response()->json([
            'comments' => $comments
        ]);
    }
}

