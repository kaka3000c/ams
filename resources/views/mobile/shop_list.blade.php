<html>
    <head>
    
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">

    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link href="/css/mobile.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--PWA-->
    
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
     <style>
    .swiper-container {
        width: 100%;
        height:168px;
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
    <!-- SEO 相关 -->
   
            <title>茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
 @include('mobile/header')

<div class="all_ms" style="margin-top:45px;margin-bottom: 60px;">
     @foreach ($shop_list as $shop)
    <a class="goodsItem" href="/mobile/shop/{{ $shop['shop_id'] }}"> 
        
        <div  class="img-box">
            <div class ="pic">
                 <img src="{{$shop['shop_logo'] }}"  class="goodsimg">
            </div>
            <div class="goods-brief">
                <div class="gos-title">{{ $shop['shop_name'] }}
           
	        <font class="shop_s"></font>
    	  
        </div> 
                <div class="brief">
               {{str_limit($shop['shop_brief'],80,'....')}} 
                </div>
                <div class="shop_name"> </div>
                <div class="shop_name"> </div>
              
                
            </div>
        
        </div>
        
    
	
	 
  </a>
@endforeach
  
   
 
  
</div>
 @include('mobile/footer')
</html>