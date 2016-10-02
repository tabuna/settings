<?php

use Orchid\Settings\Facades\Settings;

if (!function_exists('settings')) {
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function settings($key, $default = null)
    {
        return Settings::get($key, $default);
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
        return Settings::set($key, $value);
    }
}

if (!function_exists('settings_forget')) {
    /**
     * @param $key
     * @return mixed
     */
    function settings_forget($key)
    {
        return Settings::forget($key);
    }
}
