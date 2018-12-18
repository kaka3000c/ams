
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4.0.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />

<title>用户中心_ECSHOP演示站 - Powered by ECShop</title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/common.js"></script><script type="text/javascript" src="js/user.js"></script></head>
<body>

<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<div class="top-bar">
  <div class="fd_top fd_top1">
    <div class="bar-left">
          <div class="top_menu1"> 
           @include('header')
          
          </div>
    </div>
    <div class="bar-cart">
      <div class="fl cart-yh">
        <a href="user.php" class="">用户中心</a>
      </div>
             <div class="cart" id="ECS_CARTINFO"> <a href="flow.php" title="查看购物车">购物车(1)</a> </div>
    </div>
  </div>
</div>
<div class="nav-menu">
  <div class="wrap">
    <div class="logo"><a href="index.php" name="top"><img src="themes/default/images/logo.gif" /></a></div>
    <div id="mainNav" class="clearfix maxmenu">
      <div class="m_left">
      <ul>
        <li><a href="index.php" class="cur">首页</a></li>
                        <li><a href="category.php?id=16" 
        
                    >服装</a></li>
                                        <li><a href="category.php?id=22" 
        
                    >移动电源</a></li>
                                        <li><a href="category.php?id=25" 
        
                    >数码时尚</a></li>
                                        <li><a href="category.php?id=26" 
        
                    >家用电器</a></li>
                                        <li><a href="category.php?id=25" 
        
                    >数码时尚</a></li>
                              </ul>
      </div>
    </div>
    <div class="serach-box">
      <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="f_r">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="135"><input name="keywords" type="text" id="keyword" value="" class="B_input"  /></td>
            <td><input name="imageField" type="submit" value="搜索" class="go" style="cursor:pointer;" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="clear0 "></div>

<div class="block box">
 <div id="ur_here">
  <div class="path"><div>当前位置: <a href=".">首页</a> <code>&gt;</code> 用户中心</div></div> </div>
</div>

<div class="blank"></div>
<div class="block clearfix userpage">
  
  <div class="AreaL">
    <div class="box">
     <div class="box_1">
      <div class="userCenterBox">
        @include('user.menu')
      
      
      </div>
     </div>
    </div>
  </div>
  
  
  <div class="AreaR">
    <div class="box">
     <div class="box_1">
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
         
              
        
      
              <h5><span>我的订单</span></h5>
       <div class="blank"></div>
       <table width="100%" border="0" cellpadding="5" cellspacing="1">
          <thead bgcolor="#757575" style="color:#fff">
            <tr align="center">
              <td>序号</td>
              <td>订单号</td>
              <td>下单时间</td>
              <td>订单总金额</td>
              <td>订单状态</td>
              <td>操作</td>
            </tr>
          </thead>
          <tbody>
               @foreach ($order_list as $order)
               <tr align="center">
              <td>{{ $order->order_id }}</td>
              <td>{{ $order->order_sn }}</td>
              <td>{{ $order->created_at }}</td>
              <td>订单总金额</td>
              <td>{{ $order->order_status }}</td>
              <td>操作</td>
              </tr>
               @endforeach
          </tbody>
          </table>
        <div class="blank5"></div>
        <div class="page-form clearfix">

<form name="selectPageForm" action="/ecshop/ecshop/user.php" method="get">
    
  <div id="pager" class="pagebar">
                          </div>
  
  </form>
<script type="Text/Javascript" language="JavaScript">
<!--

function selectPage(sel)
{
  sel.form.submit();
}

//-->
</script>
</div>              <div class="blank5"></div>
       <h5><span>合并订单</span></h5>
       <div class="blank"></div>
        <script type="text/javascript">
                  var from_order_empty = "请选择要合并的从订单";
                  var to_order_empty = "请选择要合并的主订单";
                  var order_same = "主订单和从订单相同，请重新选择";
                  var confirm_merge = "您确实要合并这两个订单吗？";
                </script>
        <form action="user.php" method="post" name="formOrder" onsubmit="return mergeOrder()">
          <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td width="22%" align="right" bgcolor="#ffffff">主订单:</td>
              <td width="12%" align="left" bgcolor="#ffffff"><select name="to_order">
              <option value="0">请选择...</option>

                  
                </select></td>
              <td width="19%" align="right" bgcolor="#ffffff">从订单:</td>
              <td width="11%" align="left" bgcolor="#ffffff"><select name="from_order">
              <option value="0">请选择...</option>

                  
                </select></td>
              <td width="36%" bgcolor="#ffffff">&nbsp;<input name="act" value="merge_order" type="hidden" />
              <input type="submit" name="Submit"  class="bnt_blue_1" style="border:none;"  value="合并订单" /></td>
            </tr>
            <tr>
              <td bgcolor="#ffffff">&nbsp;</td>
              <td colspan="4" align="left" bgcolor="#ffffff">订单合并是在发货前将相同状态的订单合并成一新的订单。<br />收货地址，送货方式等以主定单为准。</td>
            </tr>
          </table>
        </form>
                     
       
          
     
          
    
                                                   
      
          
      
               




      </div>
     </div>
    </div>
  </div>
  
</div>
<div class="blank"></div>
<div class="foot-body">
  <div class="bads"><img src="themes/default/images/bottom.jpg"></div>
  <div class="clear10"></div>
  
     <div class="foot-help">
                      <dl>
          <dt class="xs-1">新手上路 </dt>
                      <dd><a href="article.php?id=9" target="_blank" title="售后流程">售后流程</a></dd>
                    <dd><a href="article.php?id=10" target="_blank" title="购物流程">购物流程</a></dd>
                    <dd><a href="article.php?id=11" target="_blank" title="订购方式">订购方式</a></dd>
           
        </dl>
         
                        <dl>
          <dt class="xs-2">手机常识 </dt>
                      <dd><a href="article.php?id=12" target="_blank" title="如何分辨原装电池">如何分辨原装电池</a></dd>
                    <dd><a href="article.php?id=13" target="_blank" title="如何分辨水货手机 ">如何分辨水货手机</a></dd>
                    <dd><a href="article.php?id=14" target="_blank" title="如何享受全国联保">如何享受全国联保</a></dd>
           
        </dl>
         
                        <dl>
          <dt class="xs-3">配送与支付 </dt>
                      <dd><a href="article.php?id=15" target="_blank" title="货到付款区域">货到付款区域</a></dd>
                    <dd><a href="article.php?id=16" target="_blank" title="配送支付智能查询 ">配送支付智能查询</a></dd>
                    <dd><a href="article.php?id=17" target="_blank" title="支付方式说明">支付方式说明</a></dd>
           
        </dl>
         
                        <dl>
          <dt class="xs-4">会员中心</dt>
                      <dd><a href="article.php?id=18" target="_blank" title="资金管理">资金管理</a></dd>
                    <dd><a href="article.php?id=19" target="_blank" title="我的收藏">我的收藏</a></dd>
                    <dd><a href="article.php?id=20" target="_blank" title="我的订单">我的订单</a></dd>
           
        </dl>
         
                 
                 
         
        <div class="foot-weixin">
          <div class="weixin-txt">关注demo微信</div>
          <div class="weixin-pic">
            <img src="themes/default/images/weixin.jpg">
          </div>
        </div>
    </div>
     
    
   
  
  <div class="blank"></div>
  
<div class="footer_info"> &copy; 2005-2018 ECSHOP 版权所有，并保留所有权利。       <br />
      <a href="http://xyunqi.com/products/ecshop?from=nav" target="_blank" style=" font-family:Verdana; font-size:11px;">Powered&nbsp;by&nbsp;<strong><span style="color: #3366FF">ECShop</span>&nbsp;<span style="color: #FF9966">v4.0.0</span></strong></a>&nbsp;<a href="http://www.ecshop.com/license.php?product=ecshop_b2c&url=http%3A%2F%2Flocalhost%2Fecshop%2Fecshop%2F" target="_blank"
>&nbsp;&nbsp;Licensed</a><br />
            <div>ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank"></a></div>
    </div>
  <div class="clear10"></div>
</div>
 

 

</body>
<script type="text/javascript">
var msg_title_empty = "留言标题为空";
var msg_content_empty = "留言内容为空";
var msg_title_limit = "留言标题不能超过200个字";
function showPop(item,order_sn){
 var slb = item.lastElementChild;
 slb.style.display = 'block';
  try
  {
    if (order_sn)
    {
      Ajax.call('user.php?act=ajax_delivery_info', "order_sn=" + order_sn , deliveryResponse, "POST", "JSON");
    }
  }
  catch (e) {alert(e);}
}
function hidePop(item){
 var slb = item.lastElementChild;
 slb.style.display = 'none';
}

function deliveryResponse(result){

  if (result.error == 0)
  {
    var div = document.getElementById('delivery_detail_' + result.order_sn);
    try
    {
      div.innerHTML = result.content;
    }
    catch (e) {alert(e);}
  }
}
function checkIpt(item,type=1){
  var val = item.value;
  var method = document.getElementById('payMethod');
  if(val == 'wxpay'){
    method.innerHTML = '微&nbsp;&nbsp;&nbsp;信';
  }else{
    method.innerHTML = '支付宝';
  }
  if(type==1){
    var post = 'order_id=&yunqi_paymethod='+val;
    Ajax.call('user.php?is_ajax=1&act=get_yunqi_online',post, yunqi_online, 'POST', 'JSON');
  }else{
    var post = 'rec_id=&pid=&yunqi_paymethod='+val;
    Ajax.call('user.php?is_ajax=1&act=get_yunqi_online_balance',post, yunqi_online, 'POST', 'JSON');
  }
  
}
function yunqi_online(result){
  var yunqi_online = document.getElementById('yunqi_online');
  if(result.status==true){
    yunqi_online.innerHTML = result.pay_online;
  }else{
    alert(result.msg);
  }
}

function checkIptList(item){
  var val = item.value;
  var method = document.getElementById('payMethod');
  if(val == 'wxpay'){
    method.innerHTML = '微&nbsp;&nbsp;&nbsp;信';
  }else{
    method.innerHTML = '支付宝';
  }
  document.getElementById('yunqi_payment').click();
}
</script>
</html>
