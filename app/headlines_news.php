<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class headlines_news extends Model
{
    protected $table = "headlines_news";
    public  $timestamps = false;
    //protected $dateFormat = 'U';

    public function newsHeader(){
        return $this->belongsTo('App\news_header');
    }
}
