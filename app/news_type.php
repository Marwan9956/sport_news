<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_type extends Model
{
    //
    protected $table = "news_type";
    public  $timestamps = false;
    //protected $dateFormat = 'U';

    public function newsPost()
    {
        return $this->belongsTo('App\newsBody');
    }
}
