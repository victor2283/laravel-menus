<?php

namespace App\Http\Models; 

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class NewsModel extends Model
{
    
    public function getNews($slug = false){
        
                 if ($slug == false)
                 {
                         $news = DB::table('news')->get();
                 }else{
                        $news = DB::table('news')->where('slug', $slug)->first();
                 }
                 

                 return  $news;
 }
}
