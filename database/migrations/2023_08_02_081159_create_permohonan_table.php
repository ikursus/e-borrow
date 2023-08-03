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
            $table->unsignedBigInteger('pegawai_bertanggungjawab_id')->nullable();
            $table->date('tarikh_jangka_pinjam')->nullable();
            $table->date('tarikh_jangka_pulang')->nullable();
            $table->text('tujuan_permohonan')->nullable();
            $table->string('lokasi_tujuan')->nullable();
            $table->unsignedBigInteger('pengawai_pengesah_id')->nullable();
            $table->date('tarikh_pengesahan')->nullable();
            $table->unsignedBigInteger('pengawai_pengeluar_id')->nullable();
            $table->date('tarikh_pengeluaran')->nullable();
            $table->unsignedBigInteger('pengawai_pengambil_id')->nullable();
            $table->date('tarikh_ambil')->nullable();
            $table->unsignedBigInteger('pengawai_pemulang_id')->nullable();
            $table->date('tarikh_pulangan')->nullable();
            $table->unsignedBigInteger('pengawai_penerima_pulangan_id')->nullable();
            $table->date('tarikh_terima_pulangan')->nullable();
            $table->text('catatan_pegawai_penerima')->nullable();
            $table->string('status')->default('DRAF');
            $table->timestamps();
            $table->softDeletes();

            // Setkan foreign key untuk column pegawai_pemohon_id
            // Supaya data yang masuk ke colum ini, perlu merujuk kepada kewujudan data
            // di column id di table users
            $table->foreign('pegawai_pemohon_id')->references('id')->on('users')->onDelete('cascade');
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
