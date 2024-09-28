<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class DBLog extends Model{
    protected $table = '__logs';
    protected $guarded = ['id'];
}
