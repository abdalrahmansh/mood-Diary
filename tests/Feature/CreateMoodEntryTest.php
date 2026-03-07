<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateMoodEntryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_mood_entry(): void
    {
        $response = $this
            ->withHeaders(['X-User-Id' => '42'])
            ->postJson('/api/v1/mood-entries', [
                'mood' => 'good',
                'note' => 'Productive day',
                'logged_at' => '2026-03-07 10:30:00',
            ]);

        $response
            ->assertCreated()
            ->assertJsonPath('data.user_id', 42)
            ->assertJsonPath('data.mood', 'good')
            ->assertJsonPath('data.note', 'Productive day');

        $this->assertDatabaseHas('mood_entries', [
            'user_id' => 42,
            'mood' => 'good',
            'note' => 'Productive day',
        ]);
    }

    public function test_it_fails_when_mood_is_invalid(): void
    {
        $response = $this
            ->withHeaders(['X-User-Id' => '42'])
            ->postJson('/api/v1/mood-entries', [
                'mood' => 'excellent',
            ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['mood']);
    }
}
