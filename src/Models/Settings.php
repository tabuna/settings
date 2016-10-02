<?php namespace Orchid\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Settings\SettingTrait;

class Settings extends Model
{
    use SettingTrait;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string
     */
    protected $primaryKey = 'key';

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