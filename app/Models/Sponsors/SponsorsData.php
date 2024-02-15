<?php

namespace App\Models\Sponsors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SponsorsData extends Model{
    use SoftDeletes;

    protected $table = 'sponsors_data';
    protected $guarded = ['id'];
}
