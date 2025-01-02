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
        Schema::table('website_configurations', function (Blueprint $table) {
            $table->string('nama_perusahaan')->nullable()->change();
            $table->string('nama_domain')->nullable()->change();
            $table->string('judul_website')->nullable()->change();
            $table->text('meta_deskripsi')->nullable()->change();
            $table->json('meta_kata_kunci')->nullable()->change(); 
            $table->text('alamat')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_configurations', function (Blueprint $table) {
            //
        });
    }
};
