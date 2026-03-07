<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\MoodType;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class MoodController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => MoodType::values(),
        ]);
    }
}
