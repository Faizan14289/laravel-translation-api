<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TranslationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_translation()
    {
        Sanctum::actingAs(User::factory()->create());
        $response = $this->postJson('/api/translations', [
            'locale' => 'en',
            'key' => 'greeting',
            'content' => 'Hello',
            'tags' => ['homepage']
        ]);
        $response->assertStatus(201);
    }
}
