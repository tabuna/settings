<?php namespace Orchid\Settings;

use Cache;

trait SettingTrait
{

    /**
     * @param string       $key
     * @param string|array $value
     *
     * Быстрая запись
     *
     * @return boolean
     */
    public function set($key, $value)
    {
        return $this->created([
            $key => $value,
        ]);
    }


    /**
     * @param string|array $key
     * @param string|null  $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $config = config('cache.package.settings');
        if ($config['status']) {
            return Cache::remember(implode(",", (array)$key), $config['times'], function () use ($key, $default) {
                return $this->getNoCache($key, $default);
            });
        } else {
            return $this->getNoCache($key, $default);
        }


    }


    public function getNoCache($key, $default = null)
    {
        if (is_array($key)) {
            $result = $this->whereIn('key', $key)->get();

            return empty($result) ? $default : $result;
        } else {
            $result = $this->where('key', $key)->first();

            return is_null($result) ? $default : $result;
        }
    }




    /**
     * @param string $key
     * @param null   $default
     *
     * @return string|array
     */
    /*
    public function getValue($key, $default = null)
    {
        $result = $this->where('key', $key)->first();
        return is_null($result) ? $default : $result->value;
    }
*/


    public function forget($key)
    {
        if (is_array($key)) {
            return $this->whereIn('key', $key)->remove();
        } else {
            return $this->where('key', $key)->remove();
        }
    }


}
