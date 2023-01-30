<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deletable',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($menu) {
            $menu->name = Str::slug($menu->name);
            $menu->deletable = $menu->deletable ?? true;
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
