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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text(column: 'deskripsi_singkat')->nullable();
            $table->text('deskripsi');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_artikel')->onDelete('cascade');
            $table->date('publish_date')->nullable();
            $table->string('keyword');
            $table->string('tag');
            $table->string('author');
            $table->integer('visitor')->default(0);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
