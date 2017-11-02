<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
     public function hasManyComments()
    {   //Article 有 Comments
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
