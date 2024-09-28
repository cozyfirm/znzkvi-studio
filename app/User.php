<?php

namespace App;

use App\Models\Core\Countries;
use App\Models\Users\HistoryScore;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static where(string $string, string $string1, mixed $id)
 * @method static create(array $except)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'username', 'email', 'email_verified_at', 'password', 'restart_pin', 'api_token', 'active', 'role', 'banned',
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
    public function countryRel(): HasOne{
        return $this->hasOne(Countries::class, 'id', 'country');
    }
    public function scoreRel(): HasMany{
        return $this->hasMany(HistoryScore::class, 'user_id', 'id');
    }
}
