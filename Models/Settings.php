<?php namespace Orchid\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Settings\SettingTrait;

class Settings extends Model
{
    use SettingTrait;

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];


}