<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
get
post
put 
patch
delete
*/


//<以下是這支程式用到的route 其他是練習>
//後台登入用
Route::auth();
//使用者瀏覽所有Article
Route::get('/', 'HomeController@index');
//顯示單一Article 並提供留言功能
Route::get('/article/{id}', 'ArticleController@show');
//存儲留言到資料庫
Route::post('comment', 'CommentController@store');
//Admin群組route 
Route::group(['middleware' => 'auth','namespace' => 'Admin', 'prefix' => 'admin'],function (){
    Route::get('/', 'HomeController@index');
    //一條指令 CRUD所需的路徑
    Route::resource('article', 'ArticleController');
});
//----------------------------------------------以上


//Route::get();
//三個東西組成上一下二
//Route::get("path", function(){} );
/*
Route::get('p1', function (){
    //return view('p1');
    return "p1";
});
*/
//Route::post ??
/*
Route::match(['get', 'post'], 'multy1',function(){
    return "multy1";
});
*/
/*
Route::any('multy2', function(){
    return 'multy2';
});
*/
//Route::get(user/{id})  <<<<id可以是任何數字字母不可為空 這個作法沒有給值的話就會錯誤
/*
Route::get('user/{id}', function($id){
    return "user-" . $id;
})->where('id','[0-9]+');
*/
//不一定要一致 那如果兩個以上呢？
/*
Route::get('/user2/{name?}', function($id=null){
    return "user-name " . $id;
});
*/

//use Regular Expression
//有優先順序,可是會覆蓋嗎？
//如果路徑都一樣的話會覆蓋喔，下面測試了(路徑上的變數不一樣就沒關係了)
/*
Route::get('user/{name?}', function($name = 'sac'){
    return '1User-name-' . $name;
})->where('name', '[A-Za-z]+');
*/
/*
Route::get('user/{nam?}', function($name = '111'){
    return '2User-name-' . $name;
})->where('nam', '[0-9]+');
*/
//當一個路徑有兩個變數名稱就會很重要
/*
Route::get('user1/{id?}/{name?}', function ($id = null, $name = null){

    return "user1:<br>" . "ID = $id<br>" . "NAME = $name";
//where裡面的id name 如果沒有對應的路徑上的變數，就是不發揮作用而已
})->where(['id' => '[0-9]+', 'name' => '[A-za-z]+']);
*/
/*
Route::get('user/member-center', ['as' => 'center', function() {
    //return route('center');
    return route('center');// 知道怎用了 可是有沒有別種作法？
}]);
*/
//不只有prefix 還有很多其他的值
/*
Route::group(['prefix' => 'member'], function(){

    Route::get('user/{name?}',function($name = null){
       if ($name == null){
           return "name is null !";
       }else{
           return "值=$name";
       }
       
    });

});
*/






/*
Route::get('time', function () {
    return date("Y-m-d H:i:s");
});
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get("test5/$id", function($id){

    echo $id;

});
*/
//For PracticeController
//如果綁定給controller了就不需要寫成/pc/{id?}   ||   'uses','as','middleware','prefix','namespace' 
//Route::get();  好像不支援namespace? 
//Route::get('/pc/{id}', ['namespace' => 'Aa','uses' => 'PracticeController@info','as' => 'cp','prefix' => 'pcpc']);

// 這行也是失敗的錯誤是namespace method 沒有被定義  Route::namespace('Aa')->get('/pc/{id}', ['uses' => 'PracticeController@info','as' => 'cp','prefix' => 'pcpc']);
//Route::namespace()->group......似乎是5.5的作法
//下面這是5.2的

//給PracticeController用的測試區

Route::group(['prefix' => 'Aa', 'namespace' => 'Aa'], function(){
    Route::get('pc/{name}/{id}', 'PracticeController@info');
    Route::any('dbtest', 'PracticeController@dbtest');
    Route::get('query1', 'PracticeController@query1');
    Route::get('query2', 'PracticeController@query2');
    Route::get('query3', 'PracticeController@query3');

});

/*
要用網址傳入數據話的話
1. XXXX/{id}/{aa}/{bb} 
2.在相應的controller中相應的method ex:   public function($id, $aa, $bb) {    } 就可以直接用了(是順序？還是對應?)
3.驗證判斷在Route::get()->where('id','正規表達式');  在route就可以劫下來





*/
