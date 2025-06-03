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
        Schema::create('jadwal_periksas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_dokter')->constrained(table:'users');

            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::create('janji_periksas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pasien')->constrained(table:'users');
            $table->foreignId('id_jadwal')->constrained(table:'jadwal_periksas');

            $table->text('keluhan');
            $table->unsignedInteger('no_antrian');
            $table->timestamps();
        });
        
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('id_janji_periksa')->constrained(table:'janji_periksas');
            
            $table->dateTime('tgl_periksa');
            $table->text('catatan');
            $table->unsignedInteger('biaya_periksa');
            $table->timestamps();
        });

        Schema::create('detail_periksas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_periksa')->constrained(table:'periksas', indexName:'index_detail_periksa');
            $table->foreignId('id_obat')->constrained(table:'obats', indexName:'index_detail_obat');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksa');
        Schema::dropIfExists('detail_periksa');
    }
};
