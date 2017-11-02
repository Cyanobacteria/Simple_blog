<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
class CommentController extends Controller
{
    public function store(Request $request)
    {   //如果存入為真
        if (Comment::create($request->all())) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('發表評論失敗！');
        }
    }
}

?>
