<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriLike extends Model
{
    protected $table = 'galeri_likes';
    protected $fillable = ['id_galeri', 'ip_address', 'user_agent'];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'id_galeri', 'id_galeri');
    }
}

