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
        Schema::create('informasi', function (Blueprint $table) {
            $table->increments('id_info');
            $table->string('judul');
            $table->text('deskripsi');
            $table->unsignedInteger('id_kategori');
            $table->date('tanggal');
            $table->timestamps();
            
            $table->index('id_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};

    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
