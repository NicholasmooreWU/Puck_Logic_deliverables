<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('team_id');
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('points')->default(0);
            $table->integer('penalty_minutes')->default(0);
            $table->integer('plus_minus')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
