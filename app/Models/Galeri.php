<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $fillable = ['judul','gambar','id_kategori','tanggal_upload'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function likes()
    {
        return $this->hasMany(GaleriLike::class, 'id_galeri', 'id_galeri');
    }

    public function comments()
    {
        return $this->hasMany(GaleriComment::class, 'id_galeri', 'id_galeri')->orderBy('created_at', 'desc');
    }
}

