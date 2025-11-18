<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Informasi;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGaleri = Galeri::count();
        $totalInformasi = Informasi::count();
        $totalKategori = Kategori::count();

        return view('admin.dashboard', compact('totalGaleri', 'totalInformasi', 'totalKategori'));
    }
}
