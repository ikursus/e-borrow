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
        Schema::create('maklumat_peralatan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_peralatan');
            $table->integer('kuantiti')->default(0);
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('permohonan_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('permohonan_id')->references('id')->on('permohonan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maklumat_peralatan');
    }
};
