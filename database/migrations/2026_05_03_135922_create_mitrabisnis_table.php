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
        Schema::create('mitra_bisnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('informasi_kontak');
            $table->string('status_mitra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_bisnis');
    }
};
