<?php

namespace App\Http\Controllers\Admin; //確定位置
//以下各種引入
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;//如果沒有這行就不能直接打Article::all()  要打   \App\Article::all()
class ArticleController extends Controller
{
    //

    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
 
    }
    
    public function create()
    {
        return view('admin/article/create');

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body'  => 'required',

        ]);
          $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;
        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }


    }

    public function edit($id){
        
       return view('admin/article/edit')->withArticle(Article::find($id));


    }




}
