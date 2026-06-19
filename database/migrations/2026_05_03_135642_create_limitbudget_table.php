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
        Schema::create('limit_budget', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_diubah');
            $table->string('deskripsi');
            $table->bigInteger('total_limit');
            $table->bigInteger('sisa_limit');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('limit_budget');
    }
};