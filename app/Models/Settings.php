<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    const NUMBER = 'number';
    const TEXT = 'text';
    const BOOL = 'bool';

    protected $table = 'settings';

    protected $fillable = ['key', 'value', 'description','type','category'];

    static function get($key, $default = 0)
    {
        $setting = Settings::where('key',$key)->first();
        if ($setting)
            return $setting->value;
        return $default;
    }
}
