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
        Schema::table('course_registrations', function (Blueprint $table) {
            $table->string('certificate_id')->nullable()->after('id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('course_registrations', function (Blueprint $table) {
            $table->dropColumn('certificate_id'); // Menghapus kolom certificate_id jika migration di-rollback
        });
    }
};
