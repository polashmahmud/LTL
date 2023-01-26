<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'deletable',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->slug = Str::slug($role->name);
            $role->deletable = $role->deletable ?? true;
        });

        static::updating(function ($role) {
            $role->slug = Str::slug($role->name);
        });
    }

    public function hasPermissionTo($permission)
    {
        return $this->permissions->contains('slug', $permission);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
