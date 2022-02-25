<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CalculateLove extends Controller
{
    public function index(string $his_name, string $her_name): JsonResponse
    {
        $love = new FirstLoveCalculator();

        return response()->json([
            'percent' => $love->calculatePercentage($his_name, $her_name)
        ]);

    }
}
