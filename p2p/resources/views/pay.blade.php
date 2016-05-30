<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<title>资金管理-我要充值</title>


<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


<link href="/css/common.css" rel="stylesheet" type="text/css"> 
<link href="/css/sea.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">

<link href="/css/grey2013.css" rel="stylesheet"> 

<!--时间  s-->

<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"> 

<!--时间  e-->
 
<!---静态化 - 头部内容---->


<link href="/css/forms_style.css" rel="stylesheet" type="text/css">

<style type="text/css">
.plusBank5{width:680px; height:500px;  margin-left:-340px; margin-top:-250px;_margin-top:-250px;}
.serviceFeeTR{
	display:none;
}
</style>
</head>

<body style="display: block;">
@include('top')
  <!--红包抵扣金额-->
  <!--手续费-->
  
  <!--本期次理财金最低投资金额-->
  <!--本期次理财金最高投资金额-->
  
  
   
  
<div class="clearfix"></div>
<!--layout start-->
<div class="main page215 clearfix" style="min-height:230px">
	<!--content start-->
	<div class="pt_20 fluid">
        <div class="module buy_page" style="padding:0;width:100%; float:left;">
        	<!--top s-->
            <div class="clearfix buy_box" style="background:#fff;">
            	<!--l s-->
                <div class="fl l">
                	<h3 class="pl_20 t_bt"><img src="/image/safe_safe_002.png"><span class="fc_green pl_10">账户资金安全由银行委托管理</span></h3>
	                      <ul class="clearfix td_all">

	                        <li class="fl td5">
	                        	<h4 class="fc_9">投资金额(元)</h4>
	                            <p><span class="airal fs_24 fc_orange">
	                                   {{$v_amount}}
	                            </span></p>
	                        </li>
	                        
	                    </ul>
                </div>
                <!--l e-->
                <!--r s-->
                <div class="fr r" style="width:310px;">
                	<div class="td_all2">
                        <form method=post action="http://localhost/pay/index.php">

                            <input type=text name=v_mid value="{{$v_mid}}">                    商户编号
                            <input type=text name=v_oid value="{{$v_oid}}">订单编号
                            <input type=text name=v_amount value="{{$v_amount}}">            		订单总金额
                            <input type=text name=v_moneytype value="{{$v_moneytype}}">                币种
                            <input type=text name=v_url value="{{$v_url}}">
                            支付动作完成后返回到该url，支付结果以POST方式发送
                            <input type=text name=v_md5info value="{{$v_md5info}}">


                            </table>
                        <div class="fc_6 t_r b1 newstyle" style="padding-top:100px;">
                        	<input type="submit" id="confirmBut" value="确认付款" class="btn btnSize_1 btn_orange">
                        </div>
                        </form>
                    </div>
                </div>
                <!--r e-->
               
            </div>
            </div>
            <div class="fluid">

            <!-- tab out s-->

        
    </div>
            <!--tab out end-->
            
        </div>
    </div>
    <!--content end-->

</div>
<!--layout end-->

 <!-- 遮盖层 -->
<!--地域选择银行start-->

<!--地域选择银行end-->

<!-- foot start -->
<div class="h35 clearfix"></div>

<div class="foot1 wt_1190">
	<div class="clearfix out">
    	<div class="l">
        	<ul class="clearfix fNav">
            	<li>
                	<a href="#" target="_blank" class="span01">关于我们</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>公司简介</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>业绩报告</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>法律法规</a><br>
                </li>
                <li>
                	<a href="#" target="_blank" class="span01">安全保障</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>本金保障</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>风控保障</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>账户安全</a><br>
                </li>
                <li>
                	<a href="#" target="_blank" class="span01">帮助中心</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>如何投资</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>如何借款</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>网站资费</a><br>
                </li>
                <li>
                	<a href="#" target="_blank" class="span01">用心服务</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>联系我们</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>网站地图</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>服务地区</a><br>
                </li>	
            </ul>
        </div>
        <div class="r">
        	<ul>
            	<li class="line1"><span class="fs_16 pr_20 fc_3">热线电话</span>(服务时间 09 : 00 - 21 : 00 )</li>
                <li class="line2"><span class="fs_32 bold fc_6 pr_20">010-5715520</span></li>
                <li class="line3 fc_3">关注我们<a href="#" target="_blank" class="ico" rel="nofollow"><i class="i_s"></i></a><i class="i_q" onclick="showCon_2()"></i></li>
            </ul>
        </div>
    </div>
    <div class="footlink footlink2">
    	<span class="bt">合作伙伴：</span>
        <span class="lg_box fl_img1"></span>
        <span class="lg_box fl_img2"></span>
        <span class="lg_box fl_img3"></span>
        <span class="lg_box fl_img4"></span>
        <span class="lg_box fl_img5"></span>
        <span class="lg_box fl_img6"></span>
        <span class="lg_box fl_img7"></span>
        <span class="lg_box fl_img8"></span>
        <span class="lg_box fl_img9"></span>
        <a href="#" target="_blank" class="lg_box fl_img10" rel="nofollow"></a>
    </div>
</div>
<div class="clearfix foot2 wb_1190">
	<div class="out ff">
        <div class="line2">
        	Copyright &copy; 2016 点点贷（www.dddai.com）&#12288;版权所有；市场有风险，投资需谨慎，营造合法、诚信借贷环境。
        </div>
        <div class="police">
        	<a rel="nofollow" class="img1" target="_blank" href="#"><img width="70" height="32" src="image/px_002.gif"></a>
            <a rel="nofollow" class="img2" target="_blank" href="#"><img width="70" height="32" src="image/px_002.gif"></a>
            <a rel="nofollow" class="img3" target="_blank" href="#"><img width="70" height="32" src="image/px_002.gif"></a>
            <a rel="nofollow" class="img4" target="_blank" href="#"><img width="70" height="32" src="image/px.gif"></a>
            <a rel="nofollow" class="img5" target="_blank" href="#"><img width="70" height="32" src="image/px_002.gif"></a>
        	<a rel="nofollow" class="img6" target="_blank" href="#"><img width="70" height="32" src="image/px_002.gif"></a>
            <a rel="nofollow" class="img7" target="_blank" href="#"><img width="70" height="32" src="image/px_002.gif"></a>
        </div>
    </div>
</div>

<!-- weixin start -->


<!-- weixin end -->




<!--foot end-->	









<!--foot start-->
<!--银行委托管理的电子合同-->
<div class="agreement_foot">
    <i class="ico_all size20 img_icon xy_foot_pos"></i><span class="fc_white">账户资金安全由银行和PICC共同保障</span>
</div>

<!--foot end-->





</body></html>