<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    /**
     *
     * Define the relationship between User and Employee models.
     *
     */
    public function profile_info(){
        return $this->hasOne(Information::class, 'user_id');
    }

    /**
     *
     * Define the relationship between User and Message models.
     *
     */
    public function complaint(){
        return $this->hasMany(Complain::class, 'user_id');
    }

    /**
     *
     * Define the relationship between User and Message models.
     *
     */
    public function messages(){
        return $this->hasMany(User::class, 'user_id');
    }

    /**
     *
     * Define the relationship between User and Message models.
     *
     */
    public function reply(){
        return $this->hasMany(Reply::class, 'user_id');
    }
}
