<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 */
class Config extends Model{
    protected $table = '__config';
    protected $guarded = ['id'];
}
