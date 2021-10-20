<?php

namespace Buxus\NaughtyWords;

use Illuminate\Support\Str;

class NaughtyWords
{
    public static function getForLanguage($language, $except = [])
    {
        $array = file(__DIR__ . "/../{$language}", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return $array;
    }

    public static function getForLanguageWithSlugged($language, $except = [], $exceptSlugged = [])
    {
        $swearWordsRaw = NaughtyWords::getForLanguage($language, $except);
        $swearWordsRaw = collect($swearWordsRaw)->diff($except);

        $swearWordsSlugged = $swearWordsRaw->map(function ($item) {
            return Str::slug($item, ' ');
        });
        $swearWordsSlugged = collect($swearWordsSlugged)->diff($exceptSlugged);

        $swearWords = $swearWordsRaw->merge($swearWordsSlugged)->unique();
        return $swearWords;
    }
}
