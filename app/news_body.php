<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_body extends Model
{
    //
    protected $table = "news_body";
    public  $timestamps = false;
    //protected $dateFormat = 'U';

    //One To One
    public function type(){
        return $this->hasOne('App\news_type');
    }

    //Many To One
    public function newsHeader(){
        return $this->belongsTo('App\news_header');
    }
}
