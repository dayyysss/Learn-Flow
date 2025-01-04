<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->decimal('instructor_rating', 10, 2)->nullable()->after('rating');
            $table->text('instructor_komentar')->nullable()->after('komentar');
        });
    }

    public function down(): void
    {
        // Menghapus kolom rating dan komentar untuk instruktur di tabel feedbacks
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropColumn(['instructor_rating', 'instructor_komentar']);
        });
    }
};
