<?php namespace Orchid\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Settings\SettingTrait;

class Settings extends Model
{
    use SettingTrait;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'value' => 'array',
    ];


}