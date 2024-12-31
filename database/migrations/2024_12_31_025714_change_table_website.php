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
        Schema::table('website_configurations', function (Blueprint $table) {
            Schema::table('website_configurations', function (Blueprint $table) {
                $table->dropColumn('embed_map');
                $table->dropColumn('alamat_judul');
            });
            
            Schema::table('website_configurations', function (Blueprint $table) {
                $table->text('alamat')->nullable()->change();
            });
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_configurations', function (Blueprint $table) {
            //
        });
    }
};
