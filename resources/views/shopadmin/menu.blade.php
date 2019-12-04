
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/general.css" rel="stylesheet" type="text/css" />

<link href="/css/nav.css" rel="stylesheet" type="text/css" />

<script>
<!--
var noHelp   = "<p align='center' style='color: #666'>暂时还没有该部分内容</p>";
var helpLang = "zh_cn";
//-->
</script>
</head>
<body class="nav">
<div class="menu">
  <div id="logo-div">
    <a href="index.php"><img width="87" class="logo" src="http://www.0668520.cn/storage/images/logo.jpg" alt="茂名值得买网" /></a>
       
      </div>
  <div id="license-div"></div>
  <!-- <div id="tabbar-div">
    <p>
      <span class="tab-front" id="menu-tab">菜单</span>
    </p>
  </div> -->
  <div id="main-div">
    <div id="menu-list">
      <ul class="menu" id="menu-ul">
        
                        <li key="03_promotion" class="icon-promotion" data-url="/admin/product" data-key="04_bonustype_list" name="menu" onclick="showsub(this)">
          概况                    <div class="submenu">
            <div class="title">概况</div>
            <ul>
                          <li id="sub-menu-04_bonustype_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/product" target="main-frame">概况</a></li>
                        
            </ul>
          </div>
                  </li>
              <li key="03_promotion" class="icon-promotion" data-url="/admin/bonus" data-key="04_bonustype_list" name="menu" onclick="showsub(this)">
          店铺管理                    <div class="submenu">
            <div class="title">店铺管理</div>
            <ul>
                          <li id="sub-menu-04_bonustype_list" class="menu-item" onclick="showact(this, event)"><a href="/shopadmin/shop" target="main-frame">店铺信息</a></li>
                 
                        
            
            </ul>
          </div>
                  </li>
                      
                
                     
                          <li key="04_order" class="icon-order" data-url="/admin/order" data-key="02_order_list" name="menu" onclick="showsub(this)">
          商品管理                    <div class="submenu">
            <div class="title">商品管理</div>
            <ul>
                          <li id="sub-menu-02_order_list" class="menu-item" onclick="showact(this, event)"><a href="/shopadmin/product" target="main-frame">商品列表</a></li>
                        <li id="sub-menu-02_order_list" class="menu-item" onclick="showact(this, event)"><a href="/shopadmin/product/trash" target="main-frame">商品回收站</a></li>
                        

</ul>
          </div>
                  </li>
                      
               <li key="02_cat_and_goods" class="icon-goods" data-url="/admin/banner" data-key="01_goods_list" name="menu" onclick="showsub(this)">
          房产管理                    <div class="submenu">
            <div class="title">房产管理 </div>
            <ul>
                          <li id="sub-menu-01_goods_list" class="menu-item" onclick="showact(this, event)"><a href="/shopadmin/sellhouse" target="main-frame">出售房管理</a></li>
                          <li id="sub-menu-01_goods_list" class="menu-item" onclick="showact(this, event)"><a href="/shopadmin/leasehouse" target="main-frame">租房管理</a></li>
                          
            </ul>
          </div>
                  </li>
                  </ul>
      <script language="JavaScript" src="http://api.ecshop.com/menu_ext.php?charset=utf-8&lang=zh_cn"></script>
    </div>
    <div id="help-div" style="display:none">
      <h1 id="help-title"></h1>
      <div id="help-content"></div>
    </div>
  </div>
  <div id="foot-div" onmouseover="showBar(this)" onmouseout="hideBar(this)">
    <a href="#" target="main-frame">admin</a>
    <div class="panel-hint">
      <ul>
       
        <li class="btn-exit">
          <a href="/shopadmin/logout" target="_top" class="fix-submenu">退出</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript" src="../js/global.js"></script><script type="text/javascript" src="../js/utils.js"></script><script type="text/javascript" src="../js/transport.js"></script><script type="text/javascript" src="./js/menu.js"></script><script language="JavaScript">
window.setInterval(crontab,30000);
function crontab(){
  Ajax.call('cloud.php?is_ajax=1&act=load_crontab','','', 'GET', 'JSON');
}
function showBar(item){
  var silb = item.lastElementChild;
  silb.style.display = "block";
}
function hideBar(item){
  var silb = item.lastElementChild;
  silb.style.display = "none";
}
function showsub(el) {
  var act = el.parentNode.getElementsByClassName('active');
  var url = el.getAttribute('data-url') || '';
  var key = el.getAttribute('data-key') || '';

  if (act.length) {
    Array.prototype.slice.call(act).forEach(function(el) {
      el.className = el.className.replace(/\sactive\b/i, '');
    });
  }
  el.className = el.className + ' active';
  top.document.getElementById('frame-body').cols = '240,*';
  if (url) {
    top.document.getElementById('main-frame').src=url;
    document.getElementById('sub-menu-'+key).className = 'menu-item active';
  }
}
function showact(el, e) {
  e.stopPropagation();
  var act = el.parentNode.getElementsByClassName('active');
  if (act.length) {
    Array.prototype.slice.call(act).forEach(function(el) {
      el.className = el.className.replace(/\sactive\b/i, '');
    });
  }
  el.className = el.className + ' active';
}


/**
 * 创建XML对象
 */
function createDocument()
{
  var xmlDoc;

  // create a DOM object
  if (window.ActiveXObject)
  {
    try
    {
      xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
    }
    catch (e)
    {
      try
      {
        xmlDoc = new ActiveXObject("Msxml2.DOMDocument.5.0");
      }
      catch (e)
      {
        try
        {
          xmlDoc = new ActiveXObject("Msxml2.DOMDocument.4.0");
        }
        catch (e)
        {
          try
          {
            xmlDoc = new ActiveXObject("Msxml2.DOMDocument.3.0");
          }
          catch (e)
          {
            alert(e.message);
          }
        }
      }
    }
  }
  else
  {
    if (document.implementation && document.implementation.createDocument)
    {
      xmlDoc = document.implementation.createDocument("","doc",null);
    }
    else
    {
      alert("Create XML object is failed.");
    }
  }
  xmlDoc.async = false;

  return xmlDoc;
}


</script>

</body>
</html>