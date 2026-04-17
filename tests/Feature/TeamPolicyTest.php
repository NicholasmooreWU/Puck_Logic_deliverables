<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Team;

class TeamPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_player_cannot_edit_or_delete_team()
    {
        $player = User::factory()->create(['role' => 'player']);
        $team = Team::factory()->create();

        $this->actingAs($player);
        $this->assertFalse($player->can('update', $team));
        $this->assertFalse($player->can('delete', $team));
    }

    public function test_commissioner_can_edit_and_delete_team()
    {
        $commissioner = User::factory()->create(['role' => 'commissioner']);
        $team = Team::factory()->create();

        $this->actingAs($commissioner);
        $this->assertTrue($commissioner->can('update', $team));
        $this->assertTrue($commissioner->can('delete', $team));
    }
}
