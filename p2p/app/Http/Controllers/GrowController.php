<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Proj;
use App\Bid;
use Auth;
use DB;
use App\Http\Controllers\Controller;

class GrowController extends Controller
{
  protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];
    //查询点击项目信息并显示投标标单
   public function tb($pid){
    $pro = Proj::find($pid);
    return view('lijitouzi',['pro'=>$pro]);
   }

   //提交投标表单，保存到数据库，并判断当满标时触发专用函数tbDown()
   public function tbPost(Request $req,$pid)
   {
       $sailt = strtoupper(md5($req->v_oid . $req->v_pstatus . $req->v_amount . $req->v_moneytype . '%()#QOKFDLS:1*&U'));
       if ($sailt == $req->v_md5str) {

           $pro = Proj::find($pid);
           $bid = new Bid();
           $user = $req->user();
           $bid->uid = $user->uid;
           $bid->pid = $pid;
           $bid->title = $pro->title;
           $bid->money = $req->v_amount;
           $bid->pubtime = time();
           if ($bid->save()) {
               $pro = Proj::find($pid);
               $pro->increment('revice', $bid->money);
               if ($pro->money == $pro->revice) {
                   $this->tbDown($pid);
               }
           }
           return redirect('mysy');
       }else{
           return '作死呢';
       }
   }
   //处理满标时
   function tbDown($pid){
    //1.将状态改为2 还款中
    Proj::where('pid',$pid)->update(['status'=>2]);
    //2.为借款人生成n个月的还款记录
    $pro = Proj::find($pid);
    $hks = [];
    $user = Auth::user();
    $hks['uid'] = $user->uid;
    $hks['pid'] = $pid;
    $hks['title'] = $pro->title;
    $hks['amount'] = $pro->money*$pro->rate/1200+$pro->money/$pro->hrange;
    for($i=1;$i<=$pro->hrange;$i++){
        $hks['paydate'] = date('Y-m-d',strtotime("+ $i months"));
        DB::table('hks')->insert($hks);
    }

    //3.为借款人生成n个月的收益记录

    $taks = [];
    $taks['pid'] = $pid;
    $bids = Bid::where('pid',$pid)->get();
    foreach($bids as $bid){
        $taks['title'] = $bid->title;
        $taks['uid'] = $bid->uid;
        $taks['amount'] = $bid->money*$pro->rate/$pro->hrange;
        $taks['amount'] = intval($taks['amount']/6000);
        $taks['enddate'] = date('Y-m-d',strtotime("+ $pro->hrange months"));
        DB::table('tasks')->insert($taks);
    }
   }

   //生成每天收益记录
   public function run(){
    $today = date('Y-m-d');
    $tasks = DB::table('tasks')->where('enddate','>=',$today)->get();
    foreach($tasks as $tk){
        $tk->paytime = $today;
        $tk = (array)$tk;
        unset($tk['tid']);
        unset($tk['enddate']);

        DB::table('grows')->insert($tk);
    }
   }

   //我的账单
   public function bill(){
    $user = Auth::user();
    $uid = $user->uid;
    $hks = DB::table('hks')->where('uid',$uid)->get();
    return view('mybill',['hks'=>$hks]);
   }

   //我的投资
   public function tz(){
    $user = Auth::user();
    $bids = Bid::where('bids.uid',$user->uid)->whereIn('status',[1,2])->join('projects','bids.pid','=','projects.pid')->get(['bids.*','projects.status']);
    return view('mytz',['bids'=>$bids]);
   }


   //我的收益
   public function sy(){
    $user = Auth::user();
    $grows = DB::table('grows')->where('uid',$user->uid)->orderBy('gid','desc')->get();
    return view('mysy',['grows'=>$grows]);
   }

    //在线支付
    public function pay(Request $req){
        $pays['v_amount'] = $req->money;
        $pays['v_moneytype'] = 'CNY';
        $pays['v_oid'] = date('Ymd').rand(10000,99999);
        $pays['v_mid'] = 20272562;
        $pays['v_url'] = 'http://p2p.com/tb/'.$req->pid;
        $pays['key'] = '%()#QOKFDLS:1*&U';
        $pays['v_md5info'] = strtoupper(md5($pays['v_amount'].$pays['v_moneytype'].$pays['v_oid'].$pays['v_mid'].$pays['v_url'].$pays['key']));
        return view('pay',$pays);
    }
}
