<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCourseIdFromCartTable extends Migration
{
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            // Menghapus foreign key constraint
            $table->dropForeign(['course_id']);  // Pastikan nama kolom yang sesuai dengan relasi foreign key Anda
            
            // Menghapus kolom course_id
            $table->dropColumn('course_id');
        });
    }

    public function down()
    {
        // Menambahkan kembali kolom course_id dan foreign key jika migrasi dibatalkan
        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');  // Tambahkan kembali kolom course_id
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');  // Menambahkan kembali foreign key
        });
    }
}
