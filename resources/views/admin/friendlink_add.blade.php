<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <title>ECSHOP 管理中心 - 添加友情链接 </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Laravel</title>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/layer/layer.js"></script>
        <link href="/css/general.css" rel="stylesheet" type="text/css" />
        <link href="/css/main.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../js/transport.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
    </head>
    <body>
        <script>

$(document).ready(function(){

$(".add_btn").click(function(){

link_name = $("#link_name").val();
link_url = $("#link_url").val();
show_order = $("#show_order").val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
        type: 'POST',
        url: '/admin/friendlink/insert',
        data: {link_name:link_name, link_url:link_url, show_order:show_order},
        dataType: 'json',
        async : 'false', //同步
        success: function(data){
        layer.alert(data.status);
        if (data.status = 1) {
            
           layer.alert("提交成功");
       
        } else {
           layer.alert("提交失败");
        }

        },
        error:function(data){

        
        }
});
});
});
        </script>


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
            <a class="btn btn-right" href="ads.php?act=list">友情链接列表</a>

            <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1">&nbsp;&nbsp;>&nbsp;&nbsp;添加友情链接 </span>
            <div style="clear:both"></div>
        </h1><script type="text/javascript" src="../js/calendar.php?lang=zh_cn"></script>
        <link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />
        <div class="main-div">
            <form  >
                {{ csrf_field() }}
                <table width="100%" id="general-table">
                    <tr>
                        <td  class="label">
                            友情链接名称</td>
                        <td>
                            <input type="text" id="link_name" name="link_name" value="" size="35" />
                            <br /><span class="notice-span" style="display:block"  id="NameNotic">广告名称只是作为辨别多个广告条目之用，并不显示在广告中</span>
                        </td>
                    </tr>


                    <tr>
                        <td  class="label">网址链接</td>
                        <td>
                            <input type="text" id="link_url" name="link_url" value="" size="35" />
                        </td>
                    </tr>
                    <tr>
                        <td  class="label">
                            上传友情链接logo图片</td>
                        <td>
                            <input name="photo" type="file" />
                            <br /><span class="notice-span" style="display:block"  id="AdCodeImg">上传该广告的图片文件,或者你也可以指定一个远程URL地址为广告的图片</span>
                        </td>
                    </tr>
                    <tr>
                        <td  class="label">排序</td>
                        <td><input type="text" name="show_order" id="show_order" value="" size="35" /></td>
                    </tr>


                    <tr>
                        <td class="label">&nbsp;</td>
                        <td>
                            <a  class="add_btn btn-primary button">创建文章  </a>
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
                document.get Ele me ntB yId( AdMediaType).style .display = "";
                else
                        document.getElementById(MediaList[I]).style.display = "none";
            }
                }
            
                        /**
            * 检查表单输入的数据
            */
                            functio n  validate()
                        {
                    validator = new Validator("theForm");
                        validator.required("ad_name", ad_name_empty);
                ret urn validator.passed();
                }
                
                onload = function()
                {
                    // 开始检查订单
                        startCheckOrder();
                        document.forms['theForm'].reset();
                }
                
                            //-->
                            
                            </        script>
                            <div id="f            ooter">
                        共执行 3 个查询，用时 0.016976 秒，Gzip 已禁用，内存占用 1.555 M            B<br />
                        版权所有 &copy; 2005-2018 上海商派软件有限公司，并保留所有权利        。</div>
                        <!-- 新订单提        示信息 -->
            <div id="p          opMsg">
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
                                    if (typeof (obj.onclick) == 'function' && obj.onclick.toString().indexOf('listTa b le.edit') != - 1)
                            {
                            obj.title = '点击修改内容';
                            obj.style.cssText = 'background-color: #eee;';
                            obj.onmouseout = function(e)
                            {
                            this.style.cssText = '';
             }
            }
                            else if (typeof(obj.href) != 'undefined ' && obj.href.indexOf('listTable.sort') != -1)
            {
        obj.title = '                点击对列表                排                序                ';
            }
        }
            <!--
        
        
        var MyTodolist;
        function showTodoList(adminid)
        {
                                    if (!MyTodolist)
                            {
                            var global = $import("../js/global.js", "js");
                            global.onload = global.onreadystatechange = function()
                            {
                            if (this.readyState && this.readyState == "loading")return;
                            var md5 = $import("js/md5.js", "js");
                            md5.onload = md5.onreadystatechange = function()
                            {
                            if (this.readyState && this.readyState == "loading")return;
                            var todolist = $import("js/todolist.js", "js");
                            todolist.onload = todolist.onreadystatechange = function()
        {
        if (this.readySt                    ate && thi                  s.ready                  State == "loading")return;
        MyTodolist = new Todolist();
        MyTodo                    list.show();
        }
        }                
        }
        }
                else
        {
                                    if (MyTodolist.visibility)
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
        document.getEl                      ementByI                    d("lis                t                  Div").onmouseover = function(e)
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
      if (obj.parentNode.tagNa                      me.toLow                      erCase() == "tr") row = obj.parentNode;
      else if (                      obj.parentNode.parentNode.t                a                      gName.toLowerCase() == "tr") row = obj.pa                      rentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {                         
                                if (row.                c                      ells[i].tagName != "TH") row.cells[i].style.bac                      kgroundColor = '#FFF';
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
