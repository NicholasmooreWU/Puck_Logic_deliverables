<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RadarTest extends TestCase
{
    use RefreshDatabase;

    public function test_radar_page_requires_authentication()
    {
        $response = $this->get('/analytics/radar');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_radar_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/analytics/radar');
        $response->assertStatus(200);
    }
}
