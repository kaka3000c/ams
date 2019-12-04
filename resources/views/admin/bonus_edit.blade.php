
<!-- $Id: bonus_type_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<script type="text/javascript" src="../js/calendar.php?lang=zh_cn"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加红包类型 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/general.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/transport.js"></script><script type="text/javascript" src="js/common.js"></script>
<style>
  .panel-icloud .panel-right iframe {
    height: 300px;
    margin-top: 15px;
  }
  .panel-hint{
    top: 0%;
  }
</style>

<script>
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var type_name_empty = "请输入红包类型名称!";
var type_money_empty = "请输入红包类型价格!";
var order_money_empty = "请输入订单金额!";
var type_money_isnumber = "类型金额必须为数字格式!";
var order_money_isnumber = "订单金额必须为数字格式!";
var bonus_sn_empty = "请输入红包的序列号!";
var bonus_sn_number = "红包的序列号必须是数字!";
var bonus_sum_empty = "请输入您要发放的红包数量!";
var bonus_sum_number = "红包的发放数量必须是一个整数!";
var bonus_type_empty = "请选择红包的类型金额!";
var user_rank_empty = "您没有指定会员等级!";
var user_name_empty = "您至少需要选择一个会员!";
var invalid_min_amount = "请输入订单下限（大于0的数字）";
var send_start_lt_end = "红包发放开始日期不能大于结束日期";
var use_start_lt_end = "红包使用开始日期不能大于结束日期";
//-->
/*关闭按钮*/
  function get_certificate(){
	  var panel = document.getElementById('panelCloud');
	  var mask  = document.getElementById('CMask')||null;
	  var frame = document.getElementById('CFrame');
	  if(panel&&CMask&&frame){
	      panel.style.display = 'block';
	      mask.style.display = 'block';
	      frame.src = 'https://openapi.shopex.cn/oauth/authorize?response_type=code&client_id=yogfss4l&redirect_uri=http%3A%2F%2Fecshop%2Fecshop%2Fadmin%2Fcertificate.php%3Fact%3Dget_certificate%26type%3Dindex&view=auth_ecshop';
	    }
	}

	/*关闭按钮*/
	function btnCancel(item){
	  var par  = item.offsetParent;
	  var mask  = document.getElementById('CMask')||null;
	  var frame = document.getElementById('CFrame');
	  par.style.display = 'none';
	  if(mask){mask.style.display = 'none';}
	  frame.src = '';
	}
</script>
</head>
<body>
<!--云起激活系统面板-->
<div class="panel-hint panel-icloud" id="panelCloud">
  <div class="panel-cross"><span onclick="btnCancel(this)">Ｘ</span></div>
  <div class="panel-title">
    <span class="tit">您需要激活系统</span>
    <p>用云起账号激活您的系统，享受物流查询，天工收银，手机短信等更多应用和服务</p>
  </div>
  <div class="panel-left">
    <span>没有云起账号吗？</span>
    <p>点击下列按钮一步完成注册激活！</p>
    <a href="https://account.shopex.cn/reg?refer=yunqi_ecshop" target="_blank" class="btn btn-yellow">免费注册云起账号</a>
  </div>
  <div class="panel-right">
    <h5 class="logo">云起</h5>
    <p>正在激活中</p>
    <iframe src="" frameborder="0" id="CFrame"></iframe>
    <div class="cloud-passw">
      <a target="_blank" href="https://account.shopex.cn/forget?">忘记密码？</a>
    </div>
  </div>
</div>
<!--云起激活系统面板-->
<!--遮罩-->
<div class="mask-black" id="CMask"></div>
<!--遮罩-->
<h1>
      <a class="btn btn-right" href="bonus.php?act=list">红包类型</a>
  
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1">&nbsp;&nbsp;>&nbsp;&nbsp;添加红包类型 </span>
  <div style="clear:both"></div>
</h1><div class="main-div">
<form action="/admin/bonus/update" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
      {{ csrf_field() }}
<table width="100%">
  <tr>
    <td class="label">类型名称</td>
    <td> <input type='text' name='type_id' maxlength="30" value="{{$bonus_type['type_id']}}" size='20' />  
      <input type='text' name='type_name' maxlength="30" value="{{$bonus_type['type_name']}}" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">
      <a href="javascript:showNotice('Type_money_a');" title="点击此处查看提示信息">
      <img src="images/notice.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>红包金额</td>
    <td>
    <input type="text" name="type_money" value="{{$bonus_type['type_money']}}" size="20" />
    <br /><span class="notice-span" style="display:block"  id="Type_money_a">此类型的红包可以抵销的金额</span>    </td>
  </tr>
  <tr>
    <td class="label"><a href="javascript:showNotice('NoticeMinGoodsAmount');" title="点击此处查看提示信息"> <img src="images/notice.svg" width="16" height="16" border="0" alt="点击此处查看提示信息" /></a>最小订单金额</td>
    <td><input name="min_goods_amount" type="text" id="min_goods_amount" value="{{$bonus_type['min_goods_amount']}}" size="20" />
    <br /><span class="notice-span" style="display:block"  id="NoticeMinGoodsAmount">只有商品总金额达到这个数的订单才能使用这种红包</span> </td>
  </tr>
  <tr>
    <td class="label">如何发放此类型红包</td>
    <td>
        @if ( $bonus_type['send_type']  === 0)   <input type="radio" name="send_type" value="0" checked 
        onClick="showunit(0)"  />按用户发放
       @else
       <input type="radio" name="send_type" value="0"
        onClick="showunit(0)"  />按用户发放
       @endif 
    
    
    
    
         @if ( $bonus_type['send_type']  === 1)   <input type="radio" name="send_type" value="1" checked 
        onClick="showunit(0)"  />按商品发放  
               @else                 <input type="radio" name="send_type" value="1" 
        onClick="showunit(0)"  />按商品发放                          
         @endif 
      
           @if ( $bonus_type['send_type']  === 2)   <input type="radio" name="send_type" value="2" checked 
        onClick="showunit(0)"  />按订单金额发放 
@else   <input type="radio" name="send_type" value="2" 
        onClick="showunit(0)"  />按订单金额发放
 @endif 
        
        
         
         @if ( $bonus_type['send_type']  === 3)   <input type="radio" name="send_type" value="3" checked 
        onClick="showunit(0)"  />线下发放的红包  
           @else                                              
             <input type="radio" name="send_type" value="3" 
        onClick="showunit(0)"  />线下发放的红包
    @endif 
  
  </td>
  </tr>
  <tr id="1" style="display:none">
    <td class="label">
      <a href="javascript:showNotice('Order_money_a');" title="点击此处查看提示信息">
      <img src="images/notice.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>订单下限</td>
    <td>
      <input name="min_amount" type="text" id="min_amount" value="" size="20" />
      <br /><span class="notice-span" style="display:block"  id="Order_money_a">只要订单金额达到该数值，就会发放红包给用户</span>    </td>
  </tr>
  <tr>
    <td class="label">
      <a href="javascript:showNotice('Send_start_a');" title="点击此处查看提示信息">
      <img src="images/notice.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>发放起始日期</td>
    <td>
      <input name="send_start_date" type="text" id="send_start_date" size="12" value='2019-01-20' readonly="readonly"><button name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('send_start_date', '%Y-%m-%d', false, false, 'selbtn1');" class="cal"><img src="images/cal.png" alt="calendar"></button>
      <br /><span class="notice-span" style="display:block"  id="Send_start_a">只有当前时间介于起始日期和截止日期之间时，此类型的红包才可以发放</span>
    </td>
  </tr>
  <tr>
    <td class="label">发放结束日期</td>
    <td>
      <input name="send_end_date" type="text" id="send_end_date" size="12" value='2019-02-20' readonly="readonly" /><button name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('send_end_date', '%Y-%m-%d', false, false, 'selbtn2');" class="cal"><img src="images/cal.png" alt=""></button>
    </td>
  </tr>
  <tr>
    <td class="label">
	  <a href="javascript:showNotice('Use_start_a');" title="点击此处查看提示信息">
      <img src="images/notice.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>
	使用起始日期</td>
    <td>
      <input name="use_start_date" type="text" id="use_start_date" size="12" value='2019-01-20' readonly="readonly" /><button name="selbtn3" type="button" id="selbtn3" onclick="return showCalendar('use_start_date', '%Y-%m-%d', false, false, 'selbtn3');" class="cal"><img src="images/cal.png" alt=""></button>
	  <br /><span class="notice-span" style="display:block"  id="Use_start_a">只有当前时间介于起始日期和截止日期之间时，此类型的红包才可以使用</span>
  </td>
  </tr>
  <tr>
    <td class="label">使用结束日期</td>
    <td>
      <input name="use_end_date" type="text" id="use_end_date" size="12" value='2019-02-20' readonly="readonly" /><button name="selbtn4" type="button" id="selbtn4" onclick="return showCalendar('use_start_date', '%Y-%m-%d', false, false, 'selbtn4');" class="cal"><img src="images/cal.png" alt=""></button>    </td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value=" 确定 " class="button" />
      <input type="reset" value=" 重置 " class="button" />
      <input type="hidden" name="act" value="insert" />
      <input type="hidden" name="type_id" value="" />    </td>
  </tr>
</table>
</form>
</div>
<script type="text/javascript" src="../js/utils.js"></script><script type="text/javascript" src="js/validator.js"></script>
<script language="javascript">
<!--
document.forms['theForm'].elements['type_name'].focus();
/**
 * 检查表单输入的数据
 */
function validate()
{
  validator = new Validator("theForm");
  validator.required("type_name",      type_name_empty);
  validator.required("type_money",     type_money_empty);
  validator.isNumber("type_money",     type_money_isnumber, true);
  validator.islt('send_start_date', 'send_end_date', send_start_lt_end);
  validator.islt('use_start_date', 'use_end_date', use_start_lt_end);
  if (document.getElementById(1).style.display == "")
  {
    var minAmount = parseFloat(document.forms['theForm'].elements['min_amount'].value);
    if (isNaN(minAmount) || minAmount <= 0)
    {
	  validator.addErrorMsg(invalid_min_amount);
    }	
  }
  return validator.passed();
}
onload = function()
{
  
  get_value = '';
  

  showunit(get_value)
  // 开始检查订单
  startCheckOrder();
}
/* 红包类型按订单金额发放时才填写 */
function gObj(obj)
{
  var theObj;
  if (document.getElementById)
  {
    if (typeof obj=="string") {
      return document.getElementById(obj);
    } else {
      return obj.style;
    }
  }
  return null;
}

function showunit(get_value)
{
  gObj("1").style.display =  (get_value == 2) ? "" : "none";
  document.forms['theForm'].elements['selbtn1'].disabled  = (get_value != 1 && get_value != 2);
  document.forms['theForm'].elements['selbtn2'].disabled  = (get_value != 1 && get_value != 2);

  return;
}
//-->
</script>

<div id="footer">
共执行 2 个查询，用时 0.058382 秒，Gzip 已禁用，内存占用 1.556 MB<br />
版权所有 &copy; 2005-2019 上海商派软件有限公司，并保留所有权利。</div>
<!-- 新订单提示信息 -->
<div id="popMsg">
  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#cfdef4" border="0">
  <tr>
    <td style="color: #0f2c8c" width="30" height="24"></td>
    <td style="font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px" valign="center" width="100%"> 新订单通知</td>
    <td style="padding-top: 2px;padding-right:2px" valign="center" align="right" width="19"><span title="关闭" style="cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;" onclick="Message.close()" >×</span><!-- <img title=关闭 style="cursor: hand" onclick=closediv() hspace=3 src="msgclose.jpg"> --></td>
  </tr>
  <tr>
    <td style="padding-right: 1px; padding-bottom: 1px" colspan="3" height="70">
    <div id="popMsgContent">
      <p>您有 <strong style="color:#ff0000" id="spanNewOrder">1</strong> 个新订单以及       <strong style="color:#ff0000" id="spanNewPaid">0</strong> 个新付款的订单</p>
      <p align="center" style="word-break:break-all"><a href="order.php?act=list"><span style="color:#ff0000">点击查看新订单</span></a></p>
    </div>
    </td>
  </tr>
  </table>
</div>

<!--
<embed src="images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0" id="msgBeep" width="1" height="1">
  <param name="movie" value="images/online.swf">
  <param name="quality" value="high">
  <embed src="images/online.swf" name="msgBeep" id="msgBeep" quality="high" width="0" height="0" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash">
  </embed>
</object>

<script language="JavaScript">
document.onmousemove=function(e)
{
  var obj = Utils.srcElement(e);
  if (typeof(obj.onclick) == 'function' && obj.onclick.toString().indexOf('listTable.edit') != -1)
  {
    obj.title = '点击修改内容';
    obj.style.cssText = 'background-color: #eee;';
    obj.onmouseout = function(e)
    {
      this.style.cssText = '';
    }
  }
  else if (typeof(obj.href) != 'undefined' && obj.href.indexOf('listTable.sort') != -1)
  {
    obj.title = '点击对列表排序';
  }
}
<!--


var MyTodolist;
function showTodoList(adminid)
{
  if(!MyTodolist)
  {
    var global = $import("../js/global.js","js");
    global.onload = global.onreadystatechange= function()
    {
      if(this.readyState && this.readyState=="loading")return;
      var md5 = $import("js/md5.js","js");
      md5.onload = md5.onreadystatechange= function()
      {
        if(this.readyState && this.readyState=="loading")return;
        var todolist = $import("js/todolist.js","js");
        todolist.onload = todolist.onreadystatechange = function()
        {
          if(this.readyState && this.readyState=="loading")return;
          MyTodolist = new Todolist();
          MyTodolist.show();
        }
      }
    }
  }
  else
  {
    if(MyTodolist.visibility)
    {
      MyTodolist.hide();
    }
    else
    {
      MyTodolist.show();
    }
  }
}

if (Browser.isIE)
{
  onscroll = function()
  {
    //document.getElementById('calculator').style.top = document.body.scrollTop;
    document.getElementById('popMsg').style.top = (document.body.scrollTop + document.body.clientHeight - document.getElementById('popMsg').offsetHeight) + "px";
  }
}

if (document.getElementById("listDiv"))
{
  document.getElementById("listDiv").onmouseover = function(e)
  {
    obj = Utils.srcElement(e);

    if (obj)
    {
      if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
      else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {
        if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
      }
    }

  }

  document.getElementById("listDiv").onmouseout = function(e)
  {
    obj = Utils.srcElement(e);

    if (obj)
    {
      if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
      else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {
          if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
      }
    }
  }

  document.getElementById("listDiv").onclick = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.tagName == "INPUT" && obj.type == "checkbox")
    {
      if (!document.forms['listForm'])
      {
        return;
      }
      var nodes = document.forms['listForm'].elements;
      var checked = false;

      for (i = 0; i < nodes.length; i++)
      {
        if (nodes[i].checked)
        {
           checked = true;
           break;
         }
      }

      if(document.getElementById("btnSubmit"))
      {
        document.getElementById("btnSubmit").disabled = !checked;
      }
      for (i = 1; i <= 10; i++)
      {
        if (document.getElementById("btnSubmit" + i))
        {
          document.getElementById("btnSubmit" + i).disabled = !checked;
        }
      }
    }
  }

}

//-->
</script>
</body>
</html>