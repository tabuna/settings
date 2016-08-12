<?php namespace Orchid\Settings;

use Cache;

trait SettingTrait
{
    /**
     * @param string $key
     * @param string|array $value
     *
     * Быстрая запись
     *
     * @return bool
     */
    public function set($key, $value)
    {
        Cache::forget($key);
        return $this->firstOrNew([
            'key' => $key,
        ])
            ->fill([
                'value' => $value,
            ])
            ->save();
    }

    /**
     * @param string|array $key
     * @param string|null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Cache::rememberForever(implode(',', (array)$key), function () use ($key, $default) {
            return $this->getNoCache($key, $default);
        });
    }

    /**
     * @param      $key
     * @param null $default
     */
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
     * @param $key
     *
     * @return mixed
     */
    public function forget($key)
    {
        if (is_array($key)) {
            foreach ($key as $clear) {
                Cache::forget($clear);
            }
            return $this->whereIn('key', $key)->delete();
        } else {
            Cache::forget($key);
            return $this->where('key', $key)->delete();
        }
    }


}
