<?php namespace Orchid\Settings\Facades;

use Illuminate\Support\Facades\Facade;
use Orchid\Settings\Models\Settings;

class SettingsFacades extends Facade
{
    /**
     * Получить зарегистрированное имя компонента.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Settings::class;
    }
}
