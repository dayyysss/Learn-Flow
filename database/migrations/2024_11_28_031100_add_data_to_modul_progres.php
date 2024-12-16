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
        Schema::table('modul_progress', function (Blueprint $table) {
            $table->unsignedTinyInteger('progress')->default(0)->nullable()->after('modul_id'); // Progress dalam persen (0-100)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modul_progress', function (Blueprint $table) {
            //
        });
    }
};
