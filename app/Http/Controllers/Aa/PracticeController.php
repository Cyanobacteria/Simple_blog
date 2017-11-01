<?php
//controllers 忘記加上 s
namespace App\Http\Controllers\Aa;
//如果route的namespace要連的上不只namespace的路徑要對還需要有下面那一句，雖然不懂為啥，再研究
use App\Http\Controllers\Controller;
class PracticeController extends Controller
{

    public function info($id, $name ){
       // return "ID = $id";
        //一般函數內的路徑是用 "/"
        return view('test/test1',['id' => $id,'name' => $name ]);  

    }




}    










?>
