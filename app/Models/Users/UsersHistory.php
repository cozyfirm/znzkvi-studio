<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, mixed $email)
 */
class UsersHistory extends Model{
    protected $table = 'users__history';
    protected $guarded = ['id'];

}
