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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->integer('score_amount')->default(0); // Total skor
            $table->date('date_quiz'); // Tanggal dan waktu kuis dilakukan
            $table->integer('completed_at')->nullable(); // Lama pengerjaan dalam menit
            $table->enum('status', ['tidak lulus', 'lulus'])->default('tidak lulus'); // Status kelulusan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};
