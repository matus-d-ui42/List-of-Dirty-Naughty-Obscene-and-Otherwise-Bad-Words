<?php

namespace Buxus\NaughtyWords;

use Illuminate\Support\ServiceProvider;

class NaughtyWordsModule extends ServiceProvider
{
    public function register()
    {
        $this->app->bindIf('buxus:naughty-words:helper', NaughtyWords::class);
    }

    public function boot()
    {

    }
}