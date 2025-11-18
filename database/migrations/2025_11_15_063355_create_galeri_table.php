<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id_galeri');
            $table->string('judul');
            $table->string('gambar');
            $table->unsignedInteger('id_kategori');
            $table->date('tanggal_upload');
            $table->timestamps();
            
            $table->index('id_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};

    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
