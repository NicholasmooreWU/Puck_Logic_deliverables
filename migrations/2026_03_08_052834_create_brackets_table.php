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
        Schema::create('brackets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->constrained()->cascadeOnDelete();
            $table->integer('round'); // 1 = finals, 2 = semi-finals, 3 = quarter-finals, etc.
            $table->integer('match_number'); // Position in that round (1, 2, 3, etc.)
            $table->integer('seed1')->nullable(); // Seeding position of team 1
            $table->integer('seed2')->nullable(); // Seeding position of team 2
            $table->foreignId('team1_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->foreignId('team2_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->foreignId('winner_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->foreignId('game_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('next_bracket_id')->nullable()->constrained('brackets')->nullOnDelete(); // Which bracket winner advances to
            $table->string('status')->default('pending'); // pending, in_progress, completed
            $table->timestamps();
            
            // Indexes
            $table->index(['league_id', 'round', 'match_number']);
            $table->unique(['league_id', 'round', 'match_number']); // Only one bracket per round position
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brackets');
    }
};
