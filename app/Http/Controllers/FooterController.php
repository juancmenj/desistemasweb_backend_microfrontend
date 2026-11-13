<?php

namespace App\Http\Controllers;

use App\Services\FooterContentService;
use Illuminate\Http\JsonResponse;

class FooterController extends Controller
{
    public function __construct(private FooterContentService $footer) {}

    public function show(string $lang): JsonResponse
    {
        $locale = $this->footer->resolveLocale($lang);

        return response()->json([
            'locale' => $locale,
            'container'   => $this->footer->get($locale),
        ]);
    }
}