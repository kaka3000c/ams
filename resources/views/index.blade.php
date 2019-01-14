
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4.0.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="ECSHOP演示站" />
<meta name="Description" content="ECSHOP演示站" />
<title>桃李满天水果经营部</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|ECSHOP演示站 - Powered by ECShop" href="feed.php" />
<link rel="stylesheet" type="text/css" href="/css//swiper.min.css">
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script><script type="text/javascript" src="js/index.js"></script></head>
<body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<div class="top-bar">
  <div class="fd_top fd_top1">
    <div class="bar-left">
          <div class="top_menu1"> 
          
            @if (isset($name))
         Hello {{ $name }}   <a href="/user/index" class="">用户中心</a>   <a href="/logout">退出</a>
         @else
         <a href="/login">登录</a> |  <a href="/register">免费注册</a> 
        @endif
          
          
          </div>
    <div class="bar-cart">
      <div class="fl cart-yh">
       
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
        
                    >水果大全</a></li>
                                        <li><a href="category.php?id=22" 
        
                    >今日特价</a></li>
                                        <li><a href="category.php?id=25" 
        
                    >精品推荐</a></li>
                                        
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
<script>
if (Object.prototype.toJSONString){
      var oldToJSONString = Object.toJSONString;
      Object.prototype.toJSONString = function(){
        if (arguments.length > 0){
          return false;
        }else{
          return oldToJSONString.apply(this, arguments);
        }
}}</script>
<div class="indexpage clearfix">
 
  <div class="index-banner"> 
 <style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    </style>
<div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            @foreach ($banner_list as $banner)
            <div class="swiper-slide"><img src="{{$banner->image }}" alt="智能相机" class="goodsimg"></div>
            @endforeach
        </div>
        
        <div class="swiper-pagination"></div>
    </div>
<script>
       var swiper = new Swiper('.swiper1', {
           pagination: '.swiper-pagination',
           nextButton: '.swiper-button-next',
           prevButton: '.swiper-button-prev',
           paginationClickable: true,
           spaceBetween: 0,
           centeredSlides: true,
           autoplay: 4000,
           loop:true,
           autoplayDisableOnInteraction: false
       });
</script> </div>
</div>

<div class="index-body">
  <div class="indexpage">
    <div class="body-goods">
      <div class="goods-title">当季热卖</div>
      <div class="clearfix goods-wrap">
        <div class="goods-leftad">
           
        </div>
        <div class="goods-right">
            
<div class="all_ms">
     @foreach ($product_list as $product)
    <a class="goodsItem" href="/product/detail/{{ $product->pro_id }}"> <div  class="img-box"><img src="{{$product->image }}" alt="智能相机" class="goodsimg"></div>
  <div class="goods-brief"></div>
    <div class="gos-title">{{ $product->name }}</div> 
	<div class="prices">
	        <font class="shop_s"><b>￥149元</b></font>
    	</div>
	 
  </a>
@endforeach
  
   
 
    <div class="clear0"></div>
</div>
        </div>
      </div>
  
    
      </div>
    </div>
  </div>
</div>
<div class="footer_info"> 桃李满天水果经营部       <br>
    
    </div>
 
 
</body>
</html>








