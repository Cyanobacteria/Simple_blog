<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
class ArticleController extends Controller
{
    public function show($id)
    {   //以URL傳入的$id以ORM查找
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}

?>
