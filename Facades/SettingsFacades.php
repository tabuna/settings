<?php namespace Orchid\Settings\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Settings\Entities\Setting;

class SettingsFacades extends Facade
{
    /**
     * Получить зарегистрированное имя компонента.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Setting::class;
    }
}
