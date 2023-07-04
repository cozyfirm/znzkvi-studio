<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model{
    protected $table = 'api__countries';
    protected $guarded = ['id'];
}
