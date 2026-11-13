<?php

namespace App\Http\Controllers;

use App\Services\NavBarContentService;
use Illuminate\Http\JsonResponse;

class NavBarController extends Controller
{
    public function __construct(private NavBarContentService $navBar) {}

    public function show(string $lang): JsonResponse
    {
        $locale = $this->navBar->resolveLocale($lang);

        return response()->json([
            'locale' => $locale,
            'container'   => $this->navBar->get($locale),
        ]);
    }
}