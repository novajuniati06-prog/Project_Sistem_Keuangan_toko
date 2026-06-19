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
        Schema::create('transaksi_kas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('keterangan');
            $table->decimal('nominal_bayar', 15, 2);
            $table->enum('metode_pembayaran', [
                'Cash',
                'Bank'
        ]);
        
        $table->enum('tipe_transaksi', [
            'Pemasukan',
            'Pengeluaran'
        ]);

        $table->foreignId('akun_id')
              ->constrained('limit_budget')
              ->cascadeOnDelete();


        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas');
    }
};
