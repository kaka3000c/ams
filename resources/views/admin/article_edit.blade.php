@include('UEditor::head') 
<!-- $Id: article_info.htm 16780 2009-11-09 09:28:30Z sxc_shop $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加新文章 </title>
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
var no_title = "没有文章标题";
var no_cat = "没有选择文章分类";
var not_allow_add = "系统保留分类，不允许在该分类添加文章";
var drop_confirm = "您确定要删除文章吗？";
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
      <a class="btn btn-right" href="/admin/article">文章列表</a>
  
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1">&nbsp;&nbsp;>&nbsp;&nbsp;添加新文章 </span>
  <div style="clear:both"></div>
</h1><script type="text/javascript" src="../js/utils.js"></script><script type="text/javascript" src="js/selectzone.js"></script><script type="text/javascript" src="js/validator.js"></script><!-- start goods form -->
<div class="tab-div">
  <div id="tabbar-div">
    <p>
      <span class="tab-front" id="general-tab">通用信息</span>
    </p>
  </div>

  <div id="tabbody-div">
    <form  action="/admin/article/update" method="post" enctype="multipart/form-data" name="theForm" onsubmit="return validate();">
    {{ csrf_field() }}
            <table width="90%" id="general-table">
      <tr>
        <td class="narrow-label">文章标题</td>
        <td>
            <input type="hidden" name="article_id" value="{{ $article['article_id'] }}" />
            <input type="text" name="title" size ="40" maxlength="60" value="{{ $article['title'] }}" /><span class="require-field">*</span></td>
      </tr>          
      <!--  -->
      <tr>
        <td class="narrow-label">文章分类 </td>
         
            <td>
                <select name="cat_id" >
                      <option value="0"  @if ( $article['cat_id'] === 0)  selected="selected"  @endif  >请选择...</option> 
                     
                       
                      @foreach ($category_list as $category)
                           
                            <option value="{{ $category['cat_id'] }}"
                                     @if ( $article['cat_id'] === $category['cat_id'])   selected="selected"   @endif 
                                    >{{ $category['cat_name'] }}</option> 
                           
                      @endforeach
                </select>
                           
                      </td>
      </tr>
      <!--  -->
            <tr>
        <td class="narrow-label">文章重要性</td>
        <td><input type="radio" name="article_type" value="0" checked>普通      <input type="radio" name="article_type" value="1" >置顶        <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="narrow-label">是否显示</td>
        <td>
        <input type="radio" name="is_open" value="1" checked> 显示      <input type="radio" name="is_open" value="0" > 不显示<span class="require-field">*</span>        </td>
      </tr>
            <tr>
        <td class="narrow-label">文章作者</td>
        <td><input type="text" name="author" maxlength="60" value="" /></td>
      </tr>
      <tr>
        <td class="narrow-label">作者email</td>
        <td><input type="text" name="author_email" maxlength="60" value="" /></td>
      </tr>
       <tr>
        <td class="narrow-label">来源</td>
        <td><input type="text" name="source" maxlength="60" value="{{$article['source']}}" /></td>
      </tr>
      <tr>
        <td class="narrow-label">关键字</td>
        <td><input type="text" name="keywords" maxlength="60" value="" /></td>
      </tr>
      <tr>
        <td class="narrow-label">网页描述</td>
        <td><textarea name="description" id="description" cols="40" rows="5"></textarea></td>
      </tr>
      <tr>
        <td class="narrow-label">外部链接</td>
        <td><input name="link_url" type="text" id="link_url" value="http://" maxlength="60" /></td>
      </tr>
      <tr>
        <td class="narrow-label">上传文件</td>
        <td><input type="file" name="article_img" size="35">
                 <img src="{{ $article['image'] }}" width="16">
          <span class="narrow-label">或输入文件地址          <input name="file_url" type="text" value="" size="30" maxlength="255" />
          </span></td>
      </tr>
   </table>
    <table>
     <tr><td>
           
<script id="container" name="content" type="text/plain" style="height:500px;" >
           {!! $article['content'] !!}  
</script>
<!-- 实例化编辑器 -->
<script>
var ue = UE.getEditor('container');
ue.ready(function () {
        //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
       // ue.execCommand('serverparam', '_token', TOKEN);
       // ue.getDialog("insertimage").open();
    });

</script>
         </td></tr>
   
                </table>

    
    <div class="button-div">
      <input type="hidden" name="act" value="insert" />
      <input type="hidden" name="old_title" value=""/>
      <input type="hidden" name="id" value="" />
      <input type="submit" value=" 确定 " class="button"  />
      <input type="reset" value=" 重置 " class="button" />
    </div>
    </form>
  </div>

</div>
<!-- end goods form -->
<script language="JavaScript">

var articleId = 0;
var elements  = document.forms['theForm'].elements;
var sz        = new SelectZone(1, elements['source_select'], elements['target_select'], '');


onload = function()
{
  // 开始检查订单
  startCheckOrder();
}

function validate()
{
  var validator = new Validator('theForm');
  validator.required('title', no_title);

  validator.isNullOption('article_cat',no_cat);


  return validator.passed();
}

document.getElementById("tabbar-div").onmouseover = function(e)
{
    var obj = Utils.srcElement(e);

    if (obj.className == "tab-back")
    {
        obj.className = "tab-hover";
    }
}

document.getElementById("tabbar-div").onmouseout = function(e)
{
    var obj = Utils.srcElement(e);

    if (obj.className == "tab-hover")
    {
        obj.className = "tab-back";
    }
}

document.getElementById("tabbar-div").onclick = function(e)
{
    var obj = Utils.srcElement(e);

    if (obj.className == "tab-front")
    {
        return;
    }
    else
    {
        objTable = obj.id.substring(0, obj.id.lastIndexOf("-")) + "-table";

        var tables = document.getElementsByTagName("table");
        var spans  = document.getElementsByTagName("span");

        for (i = 0; i < tables.length; i++)
        {
            if (tables[i].id == objTable)
            {
                tables[i].style.display = (Browser.isIE) ? "block" : "table";
            }
            else
            {
                tables[i].style.display = "none";
            }
        }
        for (i = 0; spans.length; i++)
        {
            if (spans[i].className == "tab-front")
            {
                spans[i].className = "tab-back";
                obj.className = "tab-front";
                break;
            }
        }
    }
}

function showNotice(objId)
{
    var obj = document.getElementById(objId);

    if (obj)
    {
        if (obj.style.display != "block")
        {
            obj.style.display = "block";
        }
        else
        {
            obj.style.display = "none";
        }
    }
}

function searchGoods()
{
    var elements  = document.forms['theForm'].elements;
    var filters   = new Object;

    filters.cat_id = elements['cat_id'].value;
    filters.brand_id = elements['brand_id'].value;
    filters.keyword = Utils.trim(elements['keyword'].value);

    sz.loadOptions('get_goods_list', filters);
}


/**
 * 选取上级分类时判断选定的分类是不是底层分类
 */
function catChanged()
{
  var obj = document.forms['theForm'].elements['article_cat'];

  cat_type = obj.options[obj.selectedIndex].getAttribute('cat_type');
  if (cat_type == undefined)
  {
    cat_type = 1;
  }

  if ((obj.selectedIndex > 0) && (cat_type == 2 || cat_type == 4))
  {
    alert(not_allow_add);
    obj.selectedIndex = 0;
    return false;
  }

  return true;
}
</script>
<div id="footer">
共执行 7 个查询，用时 0.068700 秒，Gzip 已禁用，内存占用 1.589 MB<br />
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
