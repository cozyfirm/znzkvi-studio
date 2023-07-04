<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model{
    protected static $_keywords = [
        /* Questions keywords */
        'question_category' => 'Pitanja - Kategorija',
        'question_weight' => 'Pitanja - Težina',
        'question_letters' => 'Pitanja - Slova'
    ];

    protected $table = '__keywords';
    protected $guarded = [];

    /* Return all types of keywords */
    public static function getKeywords(){ return self::$_keywords; }
    public static function getKeyword($key){ return self::$_keywords[$key]; }
    public static function getIt($key){ return Keyword::where('type', $key)->pluck('name', 'id'); }
    public static function getItByVal($key){ return Keyword::where('type', $key)->pluck('name', 'value'); }
}
