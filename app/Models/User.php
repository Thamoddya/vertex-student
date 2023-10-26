<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable=[
        'name',
        'username',
        'email',
        'mobile',
        'password',
        'last_login',
        'role_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts=[
        'password' => 'hashed'
    ];

    public function role()
    {
      return  $this->belongsTo(Role::class , 'role_id');
    }

}
