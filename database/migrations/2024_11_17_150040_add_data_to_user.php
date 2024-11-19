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
        Schema::table('users', function (Blueprint $table) {
            $table->string('publik_name')->nullable()->after('last_name');
            $table->string('profesi')->nullable()->after('password');
            $table->string('bio')->nullable()->after('profesi');
            $table->string('no_telp')->nullable()->after('bio');
            $table->json('sosial_media')->nullable()->after('no_telp');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
