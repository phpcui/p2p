<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proj;
use App\Att;
use Gregwar\Captcha\CaptchaBuilder;

class ProController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];
    //展示借款表单
    public function bor(Request $request){
        $builder = new CaptchaBuilder;
        $bu = $builder->build();
        return view('borrow',['bu'=>$bu]);
    }

    //提交并保存表单内容
    function borPost(Request $req){

            $this->validate($req,[
            'age'=>'required|in:15,40,80',
            'money'=>'required|min:1|integer',
            'mobile'=>'required|regex:/^1[34578]\d{9}/',
        ],[
                'required' => ':attribute 必须填写',
                'in' => ':attribute 不能随便修改',
                'min' => ':attribute 必须大于一',
                'integer' => ':attribute 必须为整数',
                'regex' => ':attribute 必须填写真实手机号'
            ]);

        $pro = new Proj;
        $user = $req->user();
        $att = new Att;
        $pro->age = $req->age;
        $pro->money = $req->money*100;
        $pro->mobile = $req->mobile;
        $pro->name = $user->name;
        $pro->uid = $user->uid;
        $pro->pubtime = time();
        if( $pro->save() ){
        $att->uid = $user->uid;
        $att->pid = $pro->pid;
        if( $att->save() ){
            return redirect('/');
        }           
        }


    }
}
