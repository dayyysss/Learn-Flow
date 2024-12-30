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
        Schema::create('website_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('nama_domain');
            $table->string('judul_website');
            $table->text('meta_deskripsi');
            $table->json('meta_kata_kunci'); 
            $table->string('alamat_judul');
            $table->text('alamat');
            $table->text('embed_map')->nullable();
            $table->json('informasi_kontak')->nullable();
            $table->json('informasi_sosial_media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_configurations');
    }
};
