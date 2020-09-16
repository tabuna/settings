<?php

declare(strict_types=1);

namespace Orchid\Settings;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../database/migrations/'));
    }
}
