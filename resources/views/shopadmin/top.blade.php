
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/general.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/main.css" rel="stylesheet" type="text/css">

<style type="text/css">
body{
  padding: 0;
}
</style>
<script type="text/javascript" src="../js/transport.js"></script><script type="text/javascript">
// onload = function()
// {
//   Ajax.call('index.php?is_ajax=1&act=license','', start_sendmail_Response, 'GET', 'JSON');
// }
/**
 * 帮助系统调用
 */
function web_address()
{
  var ne_add = parent.document.getElementById('main-frame');
  var ne_list = ne_add.contentWindow.document.getElementById('search_id').innerHTML;
  ne_list.replace('-', '');
  var arr = ne_list.split('-');
  window.open('help.php?al='+arr[arr.length - 1],'_blank');
}


/**
 * 授权检测回调处理
 */
// function start_sendmail_Response(result)
// {
//   // 运行正常
//   if (result.error == 0)
//   {
//     var str = '';
// 		if (result['content']['auth_str'])
// 		{
// 			str = '<a href="javascript:void(0);" target="_blank">' + result['content']['auth_str'];
// 			if (result['content']['auth_type'])
// 			{
// 				str += '[' + result['content']['auth_type'] + ']';
// 			}
// 			str += '</a> ';
// 		}

//     document.getElementById('license-div').innerHTML = str;
//   }
// }

function modalDialog(url, name, width, height)
{
  if (width == undefined)
  {
    width = 400;
  }
  if (height == undefined)
  {
    height = 300;
  }

  if (window.showModalDialog)
  {
    window.showModalDialog(url, name, 'dialogWidth=' + (width) + 'px; dialogHeight=' + (height+5) + 'px; status=off');
  }
  else
  {
    x = (window.screen.width - width) / 2;
    y = (window.screen.height - height) / 2;

    window.open(url, name, 'height='+height+', width='+width+', left='+x+', top='+y+', toolbar=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, modal=yes');
  }
}

function ShowToDoList()
{
  try
  {
    var mainFrame = window.top.frames['main-frame'];
    mainFrame.window.showTodoList(adminId);
  }
  catch (ex)
  {
  }
}


var adminId = "1";
</script>
</head>
<body>
<div id="header-div">
  <div id="submenu-div">
    <ul>
       <li><a href="http://www.0668zdm.cn/index" target="main-frame">网站首页</a></li>  
      <li><a href="" target="main-frame">关于茂名值得买网</a></li>
      
    </ul>
    <div id="send_info" style="padding: 5px 10px 0 0; clear:right;text-align: right; color: #FF9900;width:40%;float: right;">
          </div>
        <div id="load-div" style="padding: 5px 10px 0 0; color: #FF9900; display: none;width:40%;position: absolute;"><img src="images/top_loader.gif" width="16" height="16" alt="正在处理您的请求..." style="vertical-align: middle" /> 正在处理您的请求...</div>
  </div>
</div>
<div id="menu-div">
  <ul>
    <!-- <li class="fix-spacel">&nbsp;</li> -->
    <li><a href="" target="main-frame"></a></li>
    
        <!--授权按钮-->
  </ul>
  <br class="clear" />
</div>

<script>
  function showBar(item){
    var silb = item.lastElementChild;
    silb.style.display = "block";
  }
  function hideBar(item){
    var silb = item.lastElementChild;
    silb.style.display = "none";
  }
  function yunqiLogin(){
    alert("请使用云起账号登录");
  }
  /*弹层出现*/
  var bindBtn = document.getElementById('bindBtn');
  if(bindBtn){
    bindBtn.onclick = function(){
    
      var main = parent.document.getElementById('main-frame');
      var panel = main.contentWindow.document.getElementById('panelCloud');
      var frame = main.contentWindow.document.getElementById('CFrame');
      var mask = main.contentWindow.document.getElementById('CMask');
      if(panel&&mask&&frame){
        panel.style.display = 'block';
        mask.style.display = 'block';
        frame.src = 'https://openapi.shopex.cn/oauth/authorize?response_type=code&client_id=yogfss4l&redirect_uri=http%3A%2F%2Flocalhost%2Fecshop%2Fecshop%2Fadmin%2Fcertificate.php%3Fact%3Dget_certificate%26type%3Dindex&view=auth_ecshop';
      }
    }
  }

  document.getElementById('menu-div').onclick = function(e) {
    var li = this.getElementsByTagName('li');
    for (var i = 0; i < li.length; i++) {
      if (/active/i.test(li[i].className)) {
        li[i].className = '';
        break;
      }
    }
    if (e.target.tagName == 'A') e.target.parentNode.className = 'active';
  }
</script>
</body>
</html>