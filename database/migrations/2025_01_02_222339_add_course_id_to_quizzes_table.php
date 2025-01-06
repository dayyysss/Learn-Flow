<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable()->after('slug'); // Menambah kolom course_id setelah kolom id
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Menambahkan relasi foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['course_id']); // Hapus foreign key
            $table->dropColumn('course_id'); // Hapus kolom course_id
        });
    }
};