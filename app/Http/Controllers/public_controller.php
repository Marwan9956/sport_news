<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
//Models
use App\news_header;
use App\news_body;
use App\news_type;
use App\headlines_news;
use App\Exceptions\StoringDataException;
use Session;

class public_controller extends Controller
{
    //
    public function displayNews(){
        return view('layouts.newsDisplay');
    }
    /**
     * Return latest News Posts 
     */
    public function getPublicNews(){
        $newsHeader_id = DB::table('news_header')->orderBy('id','desc')->first();
        //echo $newsHeader_id->id;
        $latestNews = DB::table('news_body')->where('news_header_id',$newsHeader_id->id)->orderBy('created_at','asc')->get();
        return $latestNews;
    }

    /**
     * Return latest Headlines
     */
    public function getPublicHeadlines(){
        $newsHeader_id = DB::table('news_header')->orderBy('id','desc')->first();
        $latestHeadlines = DB::table('headlines_news')->where('news_header_id',$newsHeader_id->id)->orderBy('text')->get();
        return $latestHeadlines;
    }
}
