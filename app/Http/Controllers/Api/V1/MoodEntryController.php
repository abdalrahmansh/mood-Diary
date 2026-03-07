<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListMoodEntriesRequest;
use App\Http\Requests\StoreMoodEntryRequest;
use App\Http\Resources\MoodEntryResource;
use App\Services\MoodEntryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MoodEntryController extends Controller
{
    public function __construct(
        private readonly MoodEntryService $moodEntryService
    ) {
    }

    public function store(StoreMoodEntryRequest $request): JsonResponse
    {
        $entry = $this->moodEntryService->create(
            userId: $request->userId(),
            payload: $request->validated(),
        );

        return MoodEntryResource::make($entry)
            ->response()
            ->setStatusCode(201);
    }

    public function index(ListMoodEntriesRequest $request): AnonymousResourceCollection
    {
        $entries = $this->moodEntryService->listForUser(
            userId: $request->userId(),
            dateFrom: $request->string('date_from')->toString() ?: null,
            dateTo: $request->string('date_to')->toString() ?: null,
            perPage: $request->integer('per_page', 15),
        );

        return MoodEntryResource::collection($entries);
    }
}
