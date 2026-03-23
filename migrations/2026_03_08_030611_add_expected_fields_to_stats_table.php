<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->integer('points')->default(0)->after('assists');
            $table->integer('penalty_minutes')->default(0)->after('points');
            $table->integer('plus_minus')->default(0)->after('penalty_minutes');
        });
    }
    public function down(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->dropColumn(['points', 'penalty_minutes', 'plus_minus']);
        });
    }
};
