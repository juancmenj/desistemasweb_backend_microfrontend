<?php

namespace App\Http\Controllers;

use App\Services\HomeContentService;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function __construct(private HomeContentService $home) {}

    public function show(string $lang): JsonResponse
    {
        $locale = $this->home->resolveLocale($lang);

        return response()->json([
            'locale' => $locale,
            'container'   => $this->home->get($locale),
        ]);
    }
}