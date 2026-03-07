<?php

namespace App\Services;

use App\Models\MoodEntry;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MoodEntryService
{
    public function create(int $userId, array $payload): MoodEntry
    {
        return MoodEntry::query()->create([
            'user_id' => $userId,
            'mood' => $payload['mood'],
            'note' => $payload['note'] ?? null,
            'logged_at' => $payload['logged_at'] ?? now(),
        ]);
    }

    public function listForUser(
        int $userId,
        ?string $dateFrom,
        ?string $dateTo,
        int $perPage = 15,
    ): LengthAwarePaginator {
        $query = MoodEntry::query()
            ->forUser($userId)
            ->orderByDesc('logged_at')
            ->orderByDesc('id');

        if ($dateFrom !== null) {
            $query->where('logged_at', '>=', CarbonImmutable::parse($dateFrom)->startOfDay());
        }

        if ($dateTo !== null) {
            $query->where('logged_at', '<=', CarbonImmutable::parse($dateTo)->endOfDay());
        }

        return $query->paginate($perPage)->withQueryString();
    }
}
