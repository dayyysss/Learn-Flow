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
        Schema::table('menu_lists', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
            $table->string('url')->nullable()->change();
            $table->string('ikon')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_lists', function (Blueprint $table) {
            //
        });
    }
};
