<?php

namespace Database\Factories;

use App\Enums\MoodType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoodEntry>
 */
class MoodEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 1000),
            'mood' => fake()->randomElement(MoodType::values()),
            'note' => fake()->optional()->text(100),
            'logged_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
