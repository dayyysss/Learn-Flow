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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('categories_id')->references('id')->on('category_courses')->cascadeOnDelete();
            $table->text('deskripsi')->nullable();
            $table->foreignId('intruktur_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('harga');
            $table->string('harga_diskon');
            $table->date('tanggal_mulai');
            $table->text('tags')->nullable();
            $table->text('informasi_lain')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video')->nullable();
            $table->string('course_type');
            $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->decimal('rating')->nullable();
            $table->integer('rating_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
