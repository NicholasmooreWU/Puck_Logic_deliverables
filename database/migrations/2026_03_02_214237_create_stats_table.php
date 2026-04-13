<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('hits')->default(0);
            $table->integer('pim')->default(0); // Penalty minutes
            $table->integer('toi')->default(0); // Time on ice (seconds)
            $table->integer('shots')->default(0);
            $table->integer('saves')->nullable();
            $table->integer('points')->default(0);
            $table->integer('penalty_minutes')->default(0);
            $table->integer('plus_minus')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
