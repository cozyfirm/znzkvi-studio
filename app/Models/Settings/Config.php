<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Config extends Model{
    protected $table = '__config';
    protected $guarded = ['id'];
}
