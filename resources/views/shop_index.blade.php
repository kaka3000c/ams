
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4.0.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ECSHOP演示站" />
<meta name="Description" content="ECSHOP演示站" />
<title>茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="/css/swiper.min.css">
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
 <header id="header">
     <div id="global-search">
         <div class="search-inner z-clearfix">
             <h1 id="logo"></h1>
             <form action="" method="get" id="search-form">
                    <div class="search-wrap">
                        <div class="search-input-wrap" id="J_search_sug">
                            <input type="hidden" name="c" value="home" readonly="readonly">
                            <input type="search" class="search-input" id="J_search_input" name="s" value="" placeholder="牙膏" autocomplete="off">
                        </div>
                        <button type="submit" class="search-submit z-icons z-icon-search" onclick="dataLayer.push({'event':'11100','button':'搜索框'})"></button>
                    </div>
                    
                    <div class="hot-words">
                        热门搜索:                            <a target="_blank" rel="nofollow" class="" href="https://search.smzdm.com/?c=home&amp;s=%E5%BC%80%E5%AD%A6%E5%AD%A3" onclick="dataLayer.push({'event':'11200','button':'开学季'})">
                                开学季                            </a>
                                                    <a target="_blank" rel="nofollow" class="highlight" href="https://search.smzdm.com/?c=home&amp;s=智能锁&amp;source=hot" onclick="dataLayer.push({'event':'11200','button':'智能锁'})">
                                智能锁                            </a>
                                                    <a target="_blank" rel="nofollow" class="" href="https://search.smzdm.com/?c=youhui&amp;s=运动鞋&amp;source=hot" onclick="dataLayer.push({'event':'11200','button':'运动鞋'})">
                                运动鞋                            </a>
                                                    <a target="_blank" rel="nofollow" class="" href="https://search.smzdm.com/?c=youhui&amp;s=火车票&amp;source=hot" onclick="dataLayer.push({'event':'11200','button':'火车票优惠'})">
                                火车票优惠                            </a>
                                            </div>
                </form>
         </div>
         <div class="header_right">
             
             <a href="https://weibo.com/7181041576/" target="_blank">官方微博</a>
             <div class="zdm_qr_code">
                   <img src="http://www.0668zdm.com/storage/images/0668zdm_qr_code.jpg" alt="" class="zdm_qr_code" height="88" width="88">
                   <div class="zdm_qr_code_text">扫一扫关注公众号</div>
             </div>
         </div>
         
     </div>
 </header>
   
<div class="top-bar">
  <div class="fd_top fd_top1">
      <ul class="nav-list">
          @include('menu')
      </ul>
<div class="bar-left">
          <div class="top_menu1"> 
          
            @if (isset($name))
         Hello {{ $name }}   <a href="/user/index" class="">用户中心</a>   <a href="/logout">退出</a>
         @else
         <a href="/login">登录</a> |  <a href="/register">免费注册</a> 
        @endif
          
          
          </div>
    
  </div>
      <ul class="control-list">
             <li class="current" ><a href="#" >关于我们</a></li>
          <li class="current" ><a href="#" >商业合作</a></li>
          <li ><a href="#" >爆料投稿</a></li>
         
      </ul>
          
</div>
</div>
<div class="crumbs w1050" >
        当前位置： 
        <div class="crumbs_cate"><a href="https://www.0668zdm.com/" >首页</a></div>
        <span class="icon">&gt;</span>
        <div class="crumbs_cate"><a href="/">品牌专区</a></div>
        <span class="icon">&gt;</span>
        <div class="crumbs_cate"><a href="">{{ $shop_detail['shop_name'] }}</a></div>
</div>

<section class="w1050 clearfix" >
    <div class="brand clearfix">
        <div class="brand-face">
             <img src="{{ $shop_detail['shop_logo'] }}" alt="{{ $shop_detail['shop_name'] }}" >
        </div>  
    <div class="brand-detail" _hover-ignore="1">
                        <h1>{{ $shop_detail['shop_name'] }}</h1>
                        <div onclick="var gztext =$(this).text().replace('+','').replace(/^\s*/,'');dataLayer.push({'event':'品牌详情_'+gztext+'_品牌','品牌名':'美的'});" class="wiki-focus-btn J_user_focus" data-type="brand" data-cate="287" data-follow=""><i>+</i>关注</div>
            <div class="brand-mall">
            	
                            </div>
            <div class="brand-country">品牌简介：
            </div>
            <div class="brand-info" _hover-ignore="1">{{ $shop_detail['shop_brief'] }}  
            </div>
            <div class="brand-country">地址：
            </div>
            <div class="brand-info" _hover-ignore="1">{{ $shop_detail['address'] }}  
            </div>     
            <div class="brand-country">手机：
            </div>
            <div class="brand-info" _hover-ignore="1">{{ $shop_detail['mobile'] }}  
            </div>    
            <div class="brand-country">微信：
            </div>
            <div class="brand-info" _hover-ignore="1">{{ $shop_detail['weixing'] }}  
            </div> 
            <div class="brand-country">联系人：
            </div>
            <div class="brand-info" _hover-ignore="1">{{ $shop_detail['contact'] }}  
            </div>   
                        
   </div>
        
</div>
    <h2 class="brand-channel-title">畅销产品</h2>
    <div class="brand-channel-line"></div>
    <ul class="right-list">
         @foreach ($product_list as $product)
        <li>
            <div class="right-list-detail">
                <div class="right-list-face"><span></span><a href="/product/detail/{{ $product['pro_id'] }}" target="_blank"><img src="{{$product['image'] }}" alt=""></a></div>
                 <div class="right-list-other">
                	<div class="right-list-title"><a href="/product/detail/{{ $product['pro_id'] }}" target="_blank" _hover-ignore="1">{{ $product['goods_name'] }}<span class="red"></span></a></div>
                                       	<p class="right-list-evaluate" >{{ $product['goods_brief'] }}</p>
                                        <p class="right-list-info"></p>
                
                </div>
            </div>
        </li> 
        @endforeach
        
    </ul>
    
</section>
</body>
</html>








