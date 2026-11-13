<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class HomeContentService
{
    public function resolveLocale(string $lang): string
    {
        $lang = strtolower($lang);

        foreach (config('content.locales') as $locale => $aliases) {
            if (in_array($lang, $aliases, true)) {
                return $locale;
            }
        }

        return config('content.default_locale');
    }

    public function get(string $locale): array
    {
        $path = resource_path("cms/home/{$locale}.json");

        // La clave incluye la fecha del archivo: si lo editas, el caché se invalida solo
        return Cache::remember(
            "cms.home.{$locale}." . filemtime($path),
            now()->addHour(),
            fn() => json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR)
        );
    }
}