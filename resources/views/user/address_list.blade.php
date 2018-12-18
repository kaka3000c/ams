
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
          
          </div> </div>
    <div class="bar-cart">
      <div class="fl cart-yh">
        <a href="user.php" class="">用户中心</a>
      </div>
             <div class="cart" id="ECS_CARTINFO"> <a href="flow.php" title="查看购物车">购物车(0)</a> </div>
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
         
              
        
      
             
       
          
     
          
    
                                                   
      
              <h5><span>收货人信息</span></h5>
        <div class="blank"></div>
         
            <script type="text/javascript" src="js/region.js"></script><script type="text/javascript" src="js/shopping_flow.js"></script>            <script type="text/javascript">
              region.isAdmin = false;
                            var consignee_not_null = "收货人姓名不能为空！";
                            var country_not_null = "请您选择收货人所在国家！";
                            var province_not_null = "请您选择收货人所在省份！";
                            var city_not_null = "请您选择收货人所在城市！";
                            var district_not_null = "请您选择收货人所在区域！";
                            var invalid_email = "您输入的邮件地址不是一个合法的邮件地址。";
                            var address_not_null = "收货人的详细地址不能为空！";
                            var tele_not_null = "电话不能为空！";
                            var tele_or_mob_not_null = "电话或手机至少填写一项！";
                            var shipping_not_null = "请您选择配送方式！";
                            var payment_not_null = "请您选择支付方式！";
                            var goodsattr_style = "1";
                            var tele_invaild = "电话号码不是有效的号码";
                            var zip_not_num = "邮政编码只能填写数字";
                            var mobile_invaild = "手机号码不是合法号码";
                            
              onload = function() {
                if (!document.all)
                {
                  document.forms['theForm'].reset();
                }
              }
              
            </script>
              @foreach ($user_address_list as $user_address)
                        <form action="user.php" method="post" name="theForm" onsubmit="return checkConsignee(this)">
              <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tr>
                  <td align="right" bgcolor="#ffffff">配送区域：</td>
                  <td colspan="3" align="left" bgcolor="#ffffff"><select name="country" id="selCountries_0" onchange="region.changed(this, 1, 'selProvinces_0')">
                      <option value="0">请选择国家</option>
                                            <option value="1" selected>中国</option>
                                          </select>
                    <select name="province" id="selProvinces_0" onchange="region.changed(this, 2, 'selCities_0')">
                      <option value="0">请选择省</option>
                                            <option value="2" selected>北京</option>
                                            <option value="3" >天津</option>
                                            <option value="4" >河北省</option>
                                            <option value="5" >山西省</option>
                                            <option value="6" >内蒙古自治区</option>
                                            <option value="7" >辽宁省</option>
                                            <option value="8" >吉林省</option>
                                            <option value="9" >黑龙江省</option>
                                            <option value="10" >上海</option>
                                            <option value="11" >江苏省</option>
                                            <option value="12" >浙江省</option>
                                            <option value="13" >安徽省</option>
                                            <option value="14" >福建省</option>
                                            <option value="15" >江西省</option>
                                            <option value="16" >山东省</option>
                                            <option value="17" >河南省</option>
                                            <option value="18" >湖北省</option>
                                            <option value="19" >湖南省</option>
                                            <option value="20" >广东省</option>
                                            <option value="21" >广西壮族自治区</option>
                                            <option value="22" >海南省</option>
                                            <option value="23" >重庆</option>
                                            <option value="24" >四川省</option>
                                            <option value="25" >贵州省</option>
                                            <option value="26" >云南省</option>
                                            <option value="27" >西藏自治区</option>
                                            <option value="28" >陕西省</option>
                                            <option value="29" >甘肃省</option>
                                            <option value="30" >青海省</option>
                                            <option value="31" >宁夏回族自治区</option>
                                            <option value="32" >新疆维吾尔自治区</option>
                                            <option value="33" >台湾</option>
                                            <option value="34" >香港特别行政区</option>
                                            <option value="35" >澳门特别行政区</option>
                                            <option value="36" >海外</option>
                                          </select>
                    <select name="city" id="selCities_0" onchange="region.changed(this, 3, 'selDistricts_0')">
                      <option value="0">请选择市</option>
                                            <option value="37" selected>北京市</option>
                                          </select>
                    <select name="district" id="selDistricts_0" >
                      <option value="0">请选择区</option>
                                            <option value="403" selected>东城区</option>
                                            <option value="404" >西城区</option>
                                            <option value="405" >崇文区</option>
                                            <option value="406" >宣武区</option>
                                            <option value="407" >朝阳区</option>
                                            <option value="408" >丰台区</option>
                                            <option value="409" >石景山区</option>
                                            <option value="410" >海淀区</option>
                                            <option value="411" >门头沟区</option>
                                            <option value="412" >房山区</option>
                                            <option value="413" >通州区</option>
                                            <option value="414" >顺义区</option>
                                            <option value="415" >昌平区</option>
                                            <option value="416" >大兴区</option>
                                            <option value="417" >怀柔区</option>
                                            <option value="418" >平谷区</option>
                                            <option value="419" >密云县</option>
                                            <option value="420" >延庆县</option>
                                            <option value="421" >其它区</option>
                                          </select>
                  (必填) </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">收货人姓名：</td>
                  <td align="left" bgcolor="#ffffff"><input name="consignee" type="text" class="inputBg" id="consignee_0" value="{{ $user_address->consignee }}" />
                  (必填) </td>
                  <td align="right" bgcolor="#ffffff">电子邮件地址：</td>
                  <td align="left" bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email_0" value="{{ $user_address->email }}" />
                  (必填)</td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">详细地址：</td>
                  <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address_0" value="{{ $user_address->address }}" />
                  (必填)</td>
                  <td align="right" bgcolor="#ffffff">邮政编码：</td>
                  <td align="left" bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg" id="zipcode_0" value="{{ $user_address->zipcode }}" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">电话：</td>
                  <td align="left" bgcolor="#ffffff"><input name="tel" type="text" class="inputBg" id="tel_0" value="{{ $user_address->tel }}" />
                  </td>
                  <td align="right" bgcolor="#ffffff">手机：</td>
                  <td align="left" bgcolor="#ffffff"><input name="mobile" type="text" class="inputBg" id="mobile_0" value="{{ $user_address->mobile }}" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">&nbsp;</td>
                  <td colspan="3" align="center" bgcolor="#ffffff">                    <input type="submit" name="submit" class="bnt_blue_1" value="确认修改" />
                    <input name="button" type="button" class="bnt_blue"  onclick="if (confirm('你确认要删除该收货地址吗？'))location.href='user.php?act=drop_consignee&id=3'" value="删除" />
                                        <input type="hidden" name="act" value="act_edit_address" />
                    <input name="address_id" type="hidden" value="3" />
                  </td>
                </tr>
              </table>
            </form>
              @endforeach
                        <form action="user.php" method="post" name="theForm" onsubmit="return checkConsignee(this)">
              <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tr>
                  <td align="right" bgcolor="#ffffff">配送区域：</td>
                  <td colspan="3" align="left" bgcolor="#ffffff"><select name="country" id="selCountries_1" onchange="region.changed(this, 1, 'selProvinces_1')">
                      <option value="0">请选择国家</option>
                                            <option value="1" selected>中国</option>
                                          </select>
                    <select name="province" id="selProvinces_1" onchange="region.changed(this, 2, 'selCities_1')">
                      <option value="0">请选择省</option>
                                            <option value="2" >北京</option>
                                            <option value="3" >天津</option>
                                            <option value="4" >河北省</option>
                                            <option value="5" >山西省</option>
                                            <option value="6" >内蒙古自治区</option>
                                            <option value="7" >辽宁省</option>
                                            <option value="8" >吉林省</option>
                                            <option value="9" >黑龙江省</option>
                                            <option value="10" >上海</option>
                                            <option value="11" >江苏省</option>
                                            <option value="12" >浙江省</option>
                                            <option value="13" >安徽省</option>
                                            <option value="14" >福建省</option>
                                            <option value="15" >江西省</option>
                                            <option value="16" >山东省</option>
                                            <option value="17" >河南省</option>
                                            <option value="18" >湖北省</option>
                                            <option value="19" >湖南省</option>
                                            <option value="20" >广东省</option>
                                            <option value="21" >广西壮族自治区</option>
                                            <option value="22" >海南省</option>
                                            <option value="23" >重庆</option>
                                            <option value="24" >四川省</option>
                                            <option value="25" >贵州省</option>
                                            <option value="26" >云南省</option>
                                            <option value="27" >西藏自治区</option>
                                            <option value="28" >陕西省</option>
                                            <option value="29" >甘肃省</option>
                                            <option value="30" >青海省</option>
                                            <option value="31" >宁夏回族自治区</option>
                                            <option value="32" >新疆维吾尔自治区</option>
                                            <option value="33" >台湾</option>
                                            <option value="34" >香港特别行政区</option>
                                            <option value="35" >澳门特别行政区</option>
                                            <option value="36" >海外</option>
                                          </select>
                    <select name="city" id="selCities_1" onchange="region.changed(this, 3, 'selDistricts_1')">
                      <option value="0">请选择市</option>
                                          </select>
                    <select name="district" id="selDistricts_1" style="display:none">
                      <option value="0">请选择区</option>
                                          </select>
                  (必填) </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">收货人姓名：</td>
                  <td align="left" bgcolor="#ffffff"><input name="consignee" type="text" class="inputBg" id="consignee_1" value="" />
                  (必填) </td>
                  <td align="right" bgcolor="#ffffff">电子邮件地址：</td>
                  <td align="left" bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email_1" value="charlee3000@qq.com" />
                  (必填)</td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">详细地址：</td>
                  <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address_1" value="" />
                  (必填)</td>
                  <td align="right" bgcolor="#ffffff">邮政编码：</td>
                  <td align="left" bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg" id="zipcode_1" value="" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">电话：</td>
                  <td align="left" bgcolor="#ffffff"><input name="tel" type="text" class="inputBg" id="tel_1" value="" />
                  </td>
                  <td align="right" bgcolor="#ffffff">手机：</td>
                  <td align="left" bgcolor="#ffffff"><input name="mobile" type="text" class="inputBg" id="mobile_1" value="" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">&nbsp;</td>
                  <td colspan="3" align="center" bgcolor="#ffffff">                    <input type="submit" name="submit" class="bnt_blue_2"  value="新增收货地址"/>
                                        <input type="hidden" name="act" value="act_edit_address" />
                    <input name="address_id" type="hidden" value="" />
                  </td>
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
