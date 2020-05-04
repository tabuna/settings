<?php

use Orchid\Settings\Setting;

if (!function_exists('setting')) {
    /**
     * @param string|array $key
     * @param null         $default
     *
     * @return Setting
     */
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}
