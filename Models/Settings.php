<?php namespace Orchid\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{


    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];


}