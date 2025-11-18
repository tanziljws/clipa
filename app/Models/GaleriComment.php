<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriComment extends Model
{
    protected $table = 'galeri_comments';
    protected $fillable = ['id_galeri', 'nama', 'email', 'komentar', 'ip_address'];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'id_galeri', 'id_galeri');
    }
}

