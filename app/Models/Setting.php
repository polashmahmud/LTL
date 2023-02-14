<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public $timestamps = false;

    public static function getByKey($name, $default = null)
    {
        $setting = self::where('key', $name)->first();
        if ($setting) {
            return $setting->value;
        }
        return $default;
    }
}
