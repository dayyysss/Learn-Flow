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
        Schema::create('menu_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id'); // Atau setelah kolom lain yang sesuai
            $table->integer('order')->default(0);
            $table->string('name');
            $table->string('slug');
            $table->string('url');
            $table->string('ikon');
            // $table->foreignId('menutype_id')->references('id')->on('menu_types')->cascadeOnDelete();
            // $table->foreignId('index')->nullable()->references('id')->on('permissions')->cascadeOnDelete();
            // $table->foreignId('create')->nullable()->references('id')->on('permissions')->cascadeOnDelete();
            // $table->foreignId('update')->nullable()->references('id')->on('permissions')->cascadeOnDelete();
            // $table->foreignId('delete')->nullable()->references('id')->on('permissions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_lists');
    }
};
