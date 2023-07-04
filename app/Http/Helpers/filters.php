<?php

/* Functions used in filters (help with it) */
Class Page{
    public static function get(){
        $start = 1;
        if(isset(request()->query()['page']) and request()->query()['page'] > 1){
            if(isset(request()->query()['limit'])){
                $start = ((request()->query()['page'] - 1) * request()->query()['limit']) + 1;
            }else{
                $limit = \App\Http\Controllers\System\Core\Filters::getLimit();
                $start = ((request()->query()['page'] - 1) * $limit) + 1;
            }
        }

        return $start;
    }
}
