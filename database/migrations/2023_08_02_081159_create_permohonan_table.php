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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawai_pemohon_id')->unsigned();
            $table->unsignedBigInteger('pegawai_bertanggungjawab_id');
            $table->date('tarikh_jangka_pinjam')->nullable();
            $table->date('tarikh_jangka_pulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
