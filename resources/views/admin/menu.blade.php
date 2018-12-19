
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
    <a href="index.php"><img width="87" class="logo" src="images/ecshop_logo@2x.png" alt="ECSHOP - power for e-commerce" /></a>
        <a href="javascript:;" class="noauthorize"><img src="images/noauthorize.png" class="icon" width="12"> 未授权用户</a>
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
                    <li key="01_certificate_manage" class="icon-certificate" data-url="certificate.php?act=list_edit" data-key="certificate" name="menu" onclick="showsub(this)">
          云服务中心                    <div class="submenu">
            <div class="title">云服务中心</div>
            <ul>
                          <li id="sub-menu-certificate" class="menu-item" onclick="showact(this, event)"><a href="certificate.php?act=list_edit" target="main-frame">授权绑定</a></li>
                          <li id="sub-menu-logistic_tracking" class="menu-item" onclick="showact(this, event)"><a href="logistic_tracking.php" target="main-frame">云起物流</a></li>
                          <li id="sub-menu-service_market" class="menu-item" onclick="showact(this, event)"><a href="service_market.php" target="main-frame">服务市场</a></li>
                          <li id="sub-menu-sms_resource" class="menu-item" onclick="showact(this, event)"><a href="sms_resource.php" target="main-frame">短信平台</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="02_cat_and_goods" class="icon-goods" data-url="/admin/banner" data-key="01_goods_list" name="menu" onclick="showsub(this)">
          Banner管理                    <div class="submenu">
            <div class="title">Banner管理 </div>
            <ul>
                          <li id="sub-menu-01_goods_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/banner" target="main-frame">Banner列表</a></li>
                          <li id="sub-menu-02_goods_add" class="menu-item" onclick="showact(this, event)"><a href="/admin/banner/add" target="main-frame">添加Banner</a></li>
                       </ul>
          </div>
                  </li>
                          <li key="03_promotion" class="icon-promotion" data-url="/admin/product" data-key="04_bonustype_list" name="menu" onclick="showsub(this)">
          产品管理                    <div class="submenu">
            <div class="title">产品管理</div>
            <ul>
                          <li id="sub-menu-04_bonustype_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/product" target="main-frame">产品列表</a></li>
                          <li id="sub-menu-06_pack_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/product/add" target="main-frame">产品添加</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="04_order" class="icon-order" data-url="order.php?act=list" data-key="02_order_list" name="menu" onclick="showsub(this)">
          订单管理                    <div class="submenu">
            <div class="title">订单管理</div>
            <ul>
                          <li id="sub-menu-02_order_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/order" target="main-frame">订单列表</a></li>
                          <li id="sub-menu-03_order_query" class="menu-item" onclick="showact(this, event)"><a href="order.php?act=order_query" target="main-frame">订单查询</a></li>
                          <li id="sub-menu-04_merge_order" class="menu-item" onclick="showact(this, event)"><a href="order.php?act=merge" target="main-frame">合并订单</a></li>
                          <li id="sub-menu-05_edit_order_print" class="menu-item" onclick="showact(this, event)"><a href="order.php?act=templates" target="main-frame">订单打印</a></li>
                          <li id="sub-menu-06_undispose_booking" class="menu-item" onclick="showact(this, event)"><a href="goods_booking.php?act=list_all" target="main-frame">缺货登记</a></li>
                          <li id="sub-menu-08_add_order" class="menu-item" onclick="showact(this, event)"><a href="order.php?act=add" target="main-frame">添加订单</a></li>
                          <li id="sub-menu-09_delivery_order" class="menu-item" onclick="showact(this, event)"><a href="order.php?act=delivery_list" target="main-frame">发货单列表</a></li>
                          <li id="sub-menu-10_back_order" class="menu-item" onclick="showact(this, event)"><a href="order.php?act=back_list" target="main-frame">退货单列表</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="05_banner" class="icon-banner" data-url="ads.php?act=list" data-key="ad_list" name="menu" onclick="showsub(this)">
          广告管理                    <div class="submenu">
            <div class="title">广告管理</div>
            <ul>
                          <li id="sub-menu-ad_list" class="menu-item" onclick="showact(this, event)"><a href="ads.php?act=list" target="main-frame">广告列表</a></li>
                          <li id="sub-menu-ad_position" class="menu-item" onclick="showact(this, event)"><a href="ad_position.php?act=list" target="main-frame">广告位置</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="06_stats" class="icon-stats" data-url="flow_stats.php?act=view" data-key="flow_stats" name="menu" onclick="showsub(this)">
          报表统计                    <div class="submenu">
            <div class="title">报表统计</div>
            <ul>
                          <li id="sub-menu-flow_stats" class="menu-item" onclick="showact(this, event)"><a href="flow_stats.php?act=view" target="main-frame">流量分析</a></li>
                          <li id="sub-menu-report_guest" class="menu-item" onclick="showact(this, event)"><a href="guest_stats.php?act=list" target="main-frame">客户统计</a></li>
                          <li id="sub-menu-report_order" class="menu-item" onclick="showact(this, event)"><a href="order_stats.php?act=list" target="main-frame">订单统计</a></li>
                          <li id="sub-menu-report_sell" class="menu-item" onclick="showact(this, event)"><a href="sale_general.php?act=list" target="main-frame">销售概况</a></li>
                          <li id="sub-menu-report_users" class="menu-item" onclick="showact(this, event)"><a href="users_order.php?act=order_num" target="main-frame">会员排行</a></li>
                          <li id="sub-menu-sale_list" class="menu-item" onclick="showact(this, event)"><a href="sale_list.php?act=list" target="main-frame">销售明细</a></li>
                          <li id="sub-menu-searchengine_stats" class="menu-item" onclick="showact(this, event)"><a href="searchengine_stats.php?act=view" target="main-frame">搜索引擎</a></li>
                          <li id="sub-menu-sell_stats" class="menu-item" onclick="showact(this, event)"><a href="sale_order.php?act=goods_num" target="main-frame">销售排行</a></li>
                          <li id="sub-menu-visit_buy_per" class="menu-item" onclick="showact(this, event)"><a href="visit_sold.php?act=list" target="main-frame">访问购买率</a></li>
                          <li id="sub-menu-z_clicks_stats" class="menu-item" onclick="showact(this, event)"><a href="adsense.php?act=list" target="main-frame">站外投放JS</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="07_content" class="icon-content" data-url="articlecat.php?act=list" data-key="02_articlecat_list" name="menu" onclick="showsub(this)">
          文章管理                    <div class="submenu">
            <div class="title">文章管理</div>
            <ul>
                          <li id="sub-menu-02_articlecat_list" class="menu-item" onclick="showact(this, event)"><a href="articlecat.php?act=list" target="main-frame">文章分类</a></li>
                          <li id="sub-menu-03_article_list" class="menu-item" onclick="showact(this, event)"><a href="article.php?act=list" target="main-frame">文章列表</a></li>
                          <li id="sub-menu-article_auto" class="menu-item" onclick="showact(this, event)"><a href="article_auto.php?act=list" target="main-frame">文章自动发布</a></li>
                          <li id="sub-menu-vote_list" class="menu-item" onclick="showact(this, event)"><a href="vote.php?act=list" target="main-frame">在线调查</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="08_members" class="icon-members" data-url="users.php?act=list" data-key="03_users_list" name="menu" onclick="showsub(this)">
          会员管理                    <div class="submenu">
            <div class="title">会员管理</div>
            <ul>
                          <li id="sub-menu-03_users_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/user" target="main-frame">会员列表</a></li>
                          <li id="sub-menu-04_users_add" class="menu-item" onclick="showact(this, event)"><a href="users.php?act=add" target="main-frame">添加会员</a></li>
                          <li id="sub-menu-05_user_rank_list" class="menu-item" onclick="showact(this, event)"><a href="user_rank.php?act=list" target="main-frame">会员等级</a></li>
                          <li id="sub-menu-06_list_integrate" class="menu-item" onclick="showact(this, event)"><a href="integrate.php?act=list" target="main-frame">会员整合</a></li>
                          <li id="sub-menu-08_unreply_msg" class="menu-item" onclick="showact(this, event)"><a href="user_msg.php?act=list_all" target="main-frame">会员留言</a></li>
                          <li id="sub-menu-09_user_account" class="menu-item" onclick="showact(this, event)"><a href="user_account.php?act=list" target="main-frame">充值和提现申请</a></li>
                          <li id="sub-menu-10_user_account_manage" class="menu-item" onclick="showact(this, event)"><a href="user_account_manage.php?act=list" target="main-frame">资金管理</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="10_priv_admin" class="icon-priv" data-url="privilege.php?act=list" data-key="admin_list" name="menu" onclick="showsub(this)">
          权限管理                    <div class="submenu">
            <div class="title">权限管理</div>
            <ul>
                          <li id="sub-menu-admin_list" class="menu-item" onclick="showact(this, event)"><a href="/admin/adminuser" target="main-frame">管理员列表</a></li>
                          <li id="sub-menu-admin_logs" class="menu-item" onclick="showact(this, event)"><a href="admin_logs.php?act=list" target="main-frame">管理员日志</a></li>
                          <li id="sub-menu-admin_role" class="menu-item" onclick="showact(this, event)"><a href="role.php?act=list" target="main-frame">角色管理</a></li>
                          <li id="sub-menu-agency_list" class="menu-item" onclick="showact(this, event)"><a href="agency.php?act=list" target="main-frame">办事处列表</a></li>
                          <li id="sub-menu-suppliers_list" class="menu-item" onclick="showact(this, event)"><a href="suppliers.php?act=list" target="main-frame">供货商列表</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="11_system" class="icon-system" data-url="shop_config.php?act=list_edit" data-key="01_shop_config" name="menu" onclick="showsub(this)">
          系统设置                    <div class="submenu">
            <div class="title">系统设置</div>
            <ul>
                          <li id="sub-menu-01_shop_config" class="menu-item" onclick="showact(this, event)"><a href="shop_config.php?act=list_edit" target="main-frame">商店设置</a></li>
                          <li id="sub-menu-021_reg_fields" class="menu-item" onclick="showact(this, event)"><a href="reg_fields.php?act=list" target="main-frame">会员注册项设置</a></li>
                          <li id="sub-menu-02_payment_list" class="menu-item" onclick="showact(this, event)"><a href="payment.php?act=list" target="main-frame">支付方式</a></li>
                          <li id="sub-menu-03_shipping_list" class="menu-item" onclick="showact(this, event)"><a href="shipping.php?act=list" target="main-frame">配送方式</a></li>
                          <li id="sub-menu-04_mail_settings" class="menu-item" onclick="showact(this, event)"><a href="shop_config.php?act=mail_settings" target="main-frame">邮件服务器设置</a></li>
                          <li id="sub-menu-05_area_list" class="menu-item" onclick="showact(this, event)"><a href="area_manage.php?act=list" target="main-frame">地区列表</a></li>
                          <li id="sub-menu-07_cron_schcron" class="menu-item" onclick="showact(this, event)"><a href="cron.php?act=list" target="main-frame">计划任务</a></li>
                          <li id="sub-menu-08_friendlink_list" class="menu-item" onclick="showact(this, event)"><a href="friend_link.php?act=list" target="main-frame">友情链接</a></li>
                          <li id="sub-menu-captcha_manage" class="menu-item" onclick="showact(this, event)"><a href="captcha_manage.php?act=main" target="main-frame">验证码管理</a></li>
                          <li id="sub-menu-check_file_priv" class="menu-item" onclick="showact(this, event)"><a href="check_file_priv.php?act=check" target="main-frame">文件权限检测</a></li>
                          <li id="sub-menu-file_check" class="menu-item" onclick="showact(this, event)"><a href="filecheck.php" target="main-frame">文件校验</a></li>
                          <li id="sub-menu-navigator" class="menu-item" onclick="showact(this, event)"><a href="navigator.php?act=list" target="main-frame">自定义导航栏</a></li>
                          <li id="sub-menu-sitemap" class="menu-item" onclick="showact(this, event)"><a href="sitemap.php" target="main-frame">站点地图</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="12_template" class="icon-template" data-url="template.php?act=list" data-key="02_template_select" name="menu" onclick="showsub(this)">
          模板管理                    <div class="submenu">
            <div class="title">模板管理</div>
            <ul>
                          <li id="sub-menu-02_template_select" class="menu-item" onclick="showact(this, event)"><a href="template.php?act=list" target="main-frame">模板选择</a></li>
                          <li id="sub-menu-03_template_setup" class="menu-item" onclick="showact(this, event)"><a href="template.php?act=setup" target="main-frame">设置模板</a></li>
                          <li id="sub-menu-04_template_library" class="menu-item" onclick="showact(this, event)"><a href="template.php?act=library" target="main-frame">库项目管理</a></li>
                          <li id="sub-menu-05_edit_languages" class="menu-item" onclick="showact(this, event)"><a href="edit_languages.php?act=list" target="main-frame">语言项编辑</a></li>
                          <li id="sub-menu-06_template_backup" class="menu-item" onclick="showact(this, event)"><a href="template.php?act=backup_setting" target="main-frame">模板设置备份</a></li>
                          <li id="sub-menu-mail_template_manage" class="menu-item" onclick="showact(this, event)"><a href="mail_template.php?act=list" target="main-frame">邮件模板</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="13_backup" class="icon-backup" data-url="database.php?act=backup" data-key="02_db_manage" name="menu" onclick="showsub(this)">
          数据库管理                    <div class="submenu">
            <div class="title">数据库管理</div>
            <ul>
                          <li id="sub-menu-02_db_manage" class="menu-item" onclick="showact(this, event)"><a href="database.php?act=backup" target="main-frame">数据备份</a></li>
                          <li id="sub-menu-03_db_optimize" class="menu-item" onclick="showact(this, event)"><a href="database.php?act=optimize" target="main-frame">数据表优化</a></li>
                          <li id="sub-menu-04_sql_query" class="menu-item" onclick="showact(this, event)"><a href="sql.php?act=main" target="main-frame">SQL查询</a></li>
                          <li id="sub-menu-clear" class="menu-item" onclick="showact(this, event)"><a href="database.php?act=clear" target="main-frame">体验数据清除</a></li>
                          <li id="sub-menu-convert" class="menu-item" onclick="showact(this, event)"><a href="convert.php?act=main" target="main-frame">转换数据</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="14_sms" class="icon-sms" data-url="sms.php?act=display_send_ui" data-key="03_sms_send" name="menu" onclick="showsub(this)">
          短信管理                    <div class="submenu">
            <div class="title">短信管理</div>
            <ul>
                          <li id="sub-menu-03_sms_send" class="menu-item" onclick="showact(this, event)"><a href="sms.php?act=display_send_ui" target="main-frame">发送短信</a></li>
                          <li id="sub-menu-04_sms_sign" class="menu-item" onclick="showact(this, event)"><a href="sms.php?act=sms_sign" target="main-frame">短信签名</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="15_rec" class="icon-rec" data-url="affiliate.php?act=list" data-key="affiliate" name="menu" onclick="showsub(this)">
          推荐管理                    <div class="submenu">
            <div class="title">推荐管理</div>
            <ul>
                          <li id="sub-menu-affiliate" class="menu-item" onclick="showact(this, event)"><a href="affiliate.php?act=list" target="main-frame">推荐设置</a></li>
                          <li id="sub-menu-affiliate_ck" class="menu-item" onclick="showact(this, event)"><a href="affiliate_ck.php?act=list" target="main-frame">分成管理</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="16_email_manage" class="icon-email" data-url="attention_list.php?act=list" data-key="attention_list" name="menu" onclick="showsub(this)">
          邮件群发管理                    <div class="submenu">
            <div class="title">邮件群发管理</div>
            <ul>
                          <li id="sub-menu-attention_list" class="menu-item" onclick="showact(this, event)"><a href="attention_list.php?act=list" target="main-frame">关注管理</a></li>
                          <li id="sub-menu-email_list" class="menu-item" onclick="showact(this, event)"><a href="email_list.php?act=list" target="main-frame">邮件订阅管理</a></li>
                          <li id="sub-menu-magazine_list" class="menu-item" onclick="showact(this, event)"><a href="magazine_list.php?act=list" target="main-frame">杂志管理</a></li>
                          <li id="sub-menu-view_sendlist" class="menu-item" onclick="showact(this, event)"><a href="view_sendlist.php?act=list" target="main-frame">邮件队列管理</a></li>
                        </ul>
          </div>
                  </li>
                          <li key="18_lead_manage" class="icon-lead" data-url="mobile_setting.php?act=list" data-key="banner_mobile" name="menu" onclick="showsub(this)">
          移动端管理                    <div class="submenu">
            <div class="title">移动端管理</div>
            <ul>
                          <li id="sub-menu-banner_mobile" class="menu-item" onclick="showact(this, event)"><a href="mobile_setting.php?act=list" target="main-frame">移动端广告配置</a></li>
                          <li id="sub-menu-h5_setting" class="menu-item" onclick="showact(this, event)"><a href="h5_setting.php?act=list" target="main-frame">H5应用配置</a></li>
                          <li id="sub-menu-lead" class="menu-item" onclick="showact(this, event)"><a href="lead.php?act=list" target="main-frame">H5店铺二维码</a></li>
                          <li id="sub-menu-leancloud" class="menu-item" onclick="showact(this, event)"><a href="leancloud.php?act=list" target="main-frame">APP推送管理</a></li>
                          <li id="sub-menu-mobile_setting" class="menu-item" onclick="showact(this, event)"><a href="ecmobile_setting.php?act=list" target="main-frame">APP应用配置</a></li>
                          <li id="sub-menu-wxa_setting" class="menu-item" onclick="showact(this, event)"><a href="wxa_setting.php?act=list" target="main-frame">小程序应用配置</a></li>
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
    <a href="privilege.php?act=modif" target="main-frame">admin</a>
    <div class="panel-hint">
      <ul>
        <li>
          <a href="index.php?act=clear_cache" target="main-frame" class="fix-submenu">清除缓存</a>
        </li>
        <li class="btn-exit">
          <a href="privilege.php?act=logout" target="_top" class="fix-submenu">退出</a>
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