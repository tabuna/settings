<?php

use Orchid\Settings\Facades\SettingsFacades;

if (!function_exists('settings')) {
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function settings($key, $default = null)
    {
        return SettingsFacades::get($key, $default);
    }
}


if (!function_exists('settings_set')) {
    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    function settings_set($key, $value)
    {
        return SettingsFacades::set($key, $value);
    }
}

if (!function_exists('settings_forget')) {
    /**
     * @param $key
     * @return mixed
     */
    function settings_forget($key)
    {
        return SettingsFacades::forget($key);
    }
}
