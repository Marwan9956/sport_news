<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_header extends Model
{
    protected $table = "news_header";
    public  $timestamps = false;
    //protected $dateFormat = 'U';

    //One To Many with Headlines Table 
    public function headLines(){
        return $this->hasMany('App\headlines_news');
    }


    //One To Many with newsBody Table
    public function newsPost(){
        return $this->hasMany('App\news_body');
    }

    
    //Test
    public static function getOne(){
        return self::find(1)
                    ->leftJoin('headlines_news','news_header.id','=','headlines_news.news_header_id')
                    ->select('news_header.id as news_header_id','news_header.title as news_header_title','headlines_news.*')->get();
    }
}
