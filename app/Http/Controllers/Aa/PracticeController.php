<?php
//controllers 忘記加上 s
namespace App\Http\Controllers\Aa;
//如果route的namespace要連的上不只namespace的路徑要對還需要有下面那一句，雖然不懂為啥，再研究
use App\Http\Controllers\Controller;
//需要載入才能用 DB facade
use Illuminate\Support\Facades\DB;
class PracticeController extends Controller
{

    public function info($name, $id ){
        // EX route localhost/aa/{a}/{b}
        //直接進去Controller 是按照順序的 1.a 2.b   要取啥名子也都可以，不要看不懂就好了
        //暫時這樣下課再驗證
        // return "ID = $id";
        //一般函數內的路徑是用 "/"
        return view('test/test1',['id' => $id,'name' => $name ]);  

    }
    
    public function dbtest(){
        //DB facade way
        //查詢
        // $articles = DB::select('select * from articles');
        //新增
        //$articles = DB::insert('insert into articles(title, body, user_id) value(?, ?, ?)', ['DB facade新增','倪堃喆加入',2]); 
        //更新
        //$articles = DB::update('update articles set body = :body where id = :id', ['id' => '14', 'body' => '已經更新喔！！！']);
        //$articles = DB::table('articles')->where('id',5)->update(['body' => '我是五號'],'status' => 'active'); status是幹麻的？
       // var_dump($articles);
        //刪除
        //$articles = DB::delete('delete from articles where id = ?', [13]);
        //CRUD就update有問題查找一下
        //var_dump($articles);
        //_________________以上是DB facade way
        //_________________玩玩5.2文檔
        /*
        $articles = DB::select('select * from articles');
        var_dump($articles);
        return view('test.testforDB',['article' => $articles]);
        */
    }
    public function query1(){

     //$q1 = DB::table('articles')->insert(['title' => 'kunche ni','body' => '使用查詢器']); 
 //    $id = DB::table('articles')->insertGetId(['title' => '自動獲得ID','body' => '多少呢？', 'user_id' => '6']);
     //insert() 可以一次新增多筆 [ [...], [...] ]
     //insertGetId() 只可以一筆,然後會返回新增資料的ID
     $id = DB::table('articles')->insert([
     ['title' => '自動獲得ID2','body' => '多少呢？', 'user_id' => '6'],
     ['title' => '自動獲得ID3','body' => '多少呢？', 'user_id' => '7']  
     ]);
     var_dump($id);
    }
    public function query2(){
       // DB::table('articles')->where('id',1)->update(['title' => '我被更改了id=1']);
       // increment 預設是+1 decrement 是-1
       //$number = DB::table('articles')->decrement('user_id',1);
       //$number = DB::table('articles')->where('id',1)->decrement('user_id',-1000,['title' => 'increment 測試','body' => '測試成功？' ]);
       var_dump($number); //修改行數       

    }

    public function query3(){
        



    }
    public function query4(){}
    public function query5(){}
    public function query6(){}




}    



?>
