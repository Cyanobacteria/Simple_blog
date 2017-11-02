<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{   //決定只有哪些值可以Mass Assignment 
    // $fillable 決定誰可以 $guarded 決定誰不可以
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];
}
?>
