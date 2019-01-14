
<!-- $Id: ads_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加广告 </title>
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
var posit_name_empty = "广告位名称不能为空!";
var ad_width_empty = "请输入广告位的宽度!";
var ad_height_empty = "请输入广告位的高度!";
var ad_width_number = "广告位的宽度必须是一个数字!";
var ad_height_number = "广告位的高度必须是一个数字!";
var no_outside_address = "建议您指定该广告所要投放的站点的名称，方便于该广告的来源统计!";
var width_value = "广告位的宽度值必须在1到1024之间!";
var height_value = "广告位的高度值必须在1到1024之间!";
var ad_name_empty = "请输入广告名称!";
var ad_link_empty = "请输入广告的链接URL!";
var ad_text_empty = "广告的内容不能为空!";
var ad_photo_empty = "广告的图片不能为空!";
var ad_flash_empty = "广告的flash不能为空!";
var ad_code_empty = "广告的代码不能为空!";
var empty_position_style = "广告位的模版不能为空!";
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
      <a class="btn btn-right" href="/admin/shop">商家列表</a>
  
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1">&nbsp;&nbsp;>&nbsp;&nbsp;添加商家 </span>
  <div style="clear:both"></div>
</h1><script type="text/javascript" src="../js/calendar.php?lang=zh_cn"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<div class="main-div">
<form action="/admin/shop/insert" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
  <table width="100%" id="general-table">
    <tr>
      <td  class="label">
        商家名称</td>
      <td>
        <input type="text" name="shop_name" value="" size="35" />
        <br /><span class="notice-span" style="display:block"  id="NameNotic">广告名称只是作为辨别多个广告条目之用，并不显示在广告中</span>
      </td>
    </tr>

	
   
      <tbody id="0">
    <tr>
      <td  class="label">手机号码</td>
      <td>
        <input type="text" name="mobile" value="" size="35" />
      </td>
    </tr>
    <tr>
      <td  class="label">
       上传商家logo图片</td>
      <td>
        <input name="shop_logo" type="file" />
        <br /><span class="notice-span" style="display:block"  id="AdCodeImg">上传该广告的图片文件,或者你也可以指定一个远程URL地址为广告的图片</span>
      </td>
    </tr>
  

    <tr>
      <td  class="label">联系人</td>
      <td>
        <input type="text" name="contact" value="" size="35" />
      </td>
    </tr>
   
   
       <td class="label">&nbsp;</td>
       <td>
          
        <input type="submit" value=" 确定 " class="button" />
        <input type="reset" value=" 重置 " class="button" />
        <input type="hidden" name="act" value="insert" />
        <input type="hidden" name="id" value="" />
      </td>
    </tr>
 </table>

</form>
</div>
<script type="text/javascript" src="../js/utils.js"></script><script type="text/javascript" src="js/validator.js"></script><script language="JavaScript">
  document.forms['theForm'].elements['ad_name'].focus();
  <!--
  var MediaList = new Array('0', '1', '2', '3');
  
  function showMedia(AdMediaType)
  {
    for (I = 0; I < MediaList.length; I ++)
    {
      if (MediaList[I] == AdMediaType)
        document.getElementById(AdMediaType).style.display = "";
      else
        document.getElementById(MediaList[I]).style.display = "none";
    }
  }

  /**
   * 检查表单输入的数据
   */
  function validate()
  {
    validator = new Validator("theForm");
    validator.required("ad_name",     ad_name_empty);
    return validator.passed();
  }

  onload = function()
  {
    // 开始检查订单
    startCheckOrder();
    document.forms['theForm'].reset();
  }

  //-->
  
</script>
<div id="footer">
共执行 3 个查询，用时 0.016976 秒，Gzip 已禁用，内存占用 1.555 MB<br />
版权所有 &copy; 2005-2018 上海商派软件有限公司，并保留所有权利。</div>
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


