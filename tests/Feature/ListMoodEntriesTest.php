<?php

namespace Tests\Feature;

use App\Models\MoodEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListMoodEntriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_user_entries_with_filters_and_pagination(): void
    {
        MoodEntry::factory()->create([
            'user_id' => 1,
            'mood' => 'rad',
            'logged_at' => '2026-03-07 09:00:00',
        ]);
        MoodEntry::factory()->create([
            'user_id' => 1,
            'mood' => 'sad',
            'logged_at' => '2026-03-06 20:00:00',
        ]);
        MoodEntry::factory()->create([
            'user_id' => 1,
            'mood' => 'meh',
            'logged_at' => '2026-03-05 20:00:00',
        ]);
        MoodEntry::factory()->create([
            'user_id' => 2,
            'mood' => 'good',
            'logged_at' => '2026-03-07 11:00:00',
        ]);

        $response = $this
            ->withHeaders(['X-User-Id' => '1'])
            ->getJson('/api/v1/mood-entries?date_from=2026-03-06&date_to=2026-03-07&per_page=2');

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('data.0.user_id', 1)
            ->assertJsonPath('data.0.mood', 'rad')
            ->assertJsonPath('data.1.mood', 'sad');

        $this->assertSame(2, $response->json('meta.per_page'));
        $this->assertSame(2, $response->json('meta.total'));
    }
}
