<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ClusteringTest extends TestCase
{
    use RefreshDatabase;

    public function test_clustering_page_requires_authentication()
    {
        $response = $this->get('/analytics/clustering');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_clustering_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/analytics/clustering');
        $response->assertStatus(200);
    }
}
