<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proj;

class IndexController extends Controller
{
    public function index(){
    	$pro = Proj::where('status',1)->take(3)->get();
    	return view('index',['proj'=>$pro]);
    }
    
    //检测短信验证
    public function sms(Request $re){
        include(base_path().'/vendor/ali/TopSdk.php');
        $str = mt_rand(1000,9999);
        $re->session()->put('sms',$str);
        $c = new \TopClient;
        $c->appkey = '23354613';
        $c->secretKey = '11521ed9f0bf2ebcd437863b37b6b82e';
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend($re->mobile);
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("注册验证");
        $req->setSmsParam("{\"code\":\"{$str}\",\"product\":\"天下第一社\"}");
        $req->setRecNum($re->mobile);
        $req->setSmsTemplateCode("SMS_8335325");
        $resp = $c->execute($req);
        echo 1;
    }

    public function csms(Request $req,$cap){
        echo $req->session()->get('sms') == $cap? 1:0;
    }
}
