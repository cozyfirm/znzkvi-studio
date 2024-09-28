<?php

namespace App\Models\Users;

use App\Models\Settings\Keyword;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, $id)
 */
class HistoryScore extends Model{
    protected $table = 'users__history_score';
    protected $guarded = ['id'];

    public function date(): string{
        if (isset($this->date)) {
            return Carbon::parse($this->date)->format('d.m.Y');
        }else return "";
    }
    public function jokerRel(){
        return $this->hasOne(Keyword::class, 'value', 'joker')->where('type', 'question_category');
    }
}
