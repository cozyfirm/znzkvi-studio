<?php

namespace App\Models\Users;

use App\Models\Core\Countries;
use App\Models\Settings\Keyword;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, mixed $email)
 */
class UsersHistory extends Model{
    protected $table = 'users__history';
    protected $guarded = ['id'];

    public function countryRel(){
        return $this->hasOne(Countries::class, 'id', 'country');
    }

    public function scoreRel(){
        return $this->hasMany(HistoryScore::class, 'history_id', 'id');
    }
}
