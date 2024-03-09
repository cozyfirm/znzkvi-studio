<?php

namespace App\Models\Sponsors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1)
 */
class SponsorsData extends Model{
    use SoftDeletes;

    protected $table = 'sponsors_data';
    protected $guarded = ['id'];
}
