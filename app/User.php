<?php

namespace App;

use App\Models\Core\Countries;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'email_verified_at', 'password', 'restart_pin', 'api_token', 'active', 'role', 'banned',
        'prefix', 'phone', 'address', 'city', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     *  User relationships
     */
    public function countryRel(){
        return $this->hasOne(Countries::class, 'id', 'country');
    }
}
