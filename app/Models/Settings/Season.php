<?php

namespace App\Models\Settings;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static truncate()
 * @method static create(array $array)
 */
class Season extends Model{
    protected $table = '__seasons';
    protected $guarded = ['id'];

    public function seasonRel(): HasOne{
        return $this->hasOne(Keyword::class, 'value', 'season_id')->where('type', 'seasons');
    }
    public function date(): string{
        return isset($this->date) ? Carbon::parse($this->date)->format('d.m.Y') : '';
    }
}
