<?php

namespace Buxus\NaughtyWords;

class NaughtyWords
{
    public function getForLanguage($language)
    {
        $array = file(__DIR__ . "/../{$language}");
        return $array;
    }
}