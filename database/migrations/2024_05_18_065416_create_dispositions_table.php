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
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->string("asal_surat");
            $table->string("nomor_surat");
            $table->string("tanggal_surat");
            $table->string("tanggal_diterima");
            $table->string("nomor_agenda");
            $table->string("sifat_surat");
            $table->string("perihal");
            $table->string("diteruskan");
            $table->string("hormat");
            $table->string("catatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositions');
    }
};
