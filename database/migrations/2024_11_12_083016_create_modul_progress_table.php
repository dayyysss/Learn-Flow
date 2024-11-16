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
        Schema::create('modul_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_registrations_id')->references('id')->on('course_registrations')->cascadeOnDelete();
            $table->foreignId('modul_id')->references('id')->on('moduls')->cascadeOnDelete();
            $table->enum('status', ['belum dimulai', 'proses', 'selesai'])->default('belum dimulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_progress');
    }
};
