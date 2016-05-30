<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proj;
use App\Att;

class CheckController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];
    //显示项目列表
    public function pList(){
        $pro = Proj::orderBy('pid')->paginate(2);
        return view('prolist',['pro'=>$pro]);
    }

    //获取审核表的内容并显示表单
    public function check($pid){
        $pro = proj::find($pid);
        return view('shenhe',['pro'=>$pro]);
    }

    //保存审核内容
    public function checkPost($pid){
        $req = Request();
        $pro = Proj::find($pid);
        $att = Att::where('pid',$pid)->first();

        $pro->title = $req->title;
        $pro->money = $req->money*100;
        $pro->hrange = $req->hrange;
        $pro->rate = $req->rate;
        $pro->status = $req->status;
        $pj = $pro->save();

        $att->gender = $req->gender;
        $att->title = $req->title;
        $att->realname = $req->realname;
        $att->udesc = $req->udesc;
        if($pj&&( $att->save() ) ){
            return redirect('/plist');
        }
    }
}
