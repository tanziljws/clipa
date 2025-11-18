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
        Schema::create('galeri_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_galeri');
            $table->string('nama');
            $table->string('email')->nullable();
            $table->text('komentar');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            $table->index('id_galeri');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_comments');
    }
};

     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_comments');
    }
};
