<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        if ($this->avatar) {
            return config('app.url') . '/storage/avatar/' . $this->avatar;
        } else {
            return null;
        }
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->role->permissions->contains($permission);
    }

    public function toSearchableArray()
    {
        $array = ['id' => $this->id, 'name' => $this->name, 'email' => $this->email];
        return $array;
    }
}
