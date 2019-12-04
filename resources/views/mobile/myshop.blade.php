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
<div class="shop">
    <div class="shop_logo"> <img src="{{$shop_detail['shop_logo'] }}"  class="goodsimg"></div>
    <ul class="shop_detail">
      <li>  实体店名称：{{ $shop_detail['shop_name'] }}</li>
       <li>  实体店地址：{{ $shop_detail['address'] }}</li>
       <li>  手机：{{ $shop_detail['mobile'] }}</li>
       <li>  微信：{{ $shop_detail['weixing'] }}</li>
            
    </ul>
    
</div>
<div class="brand" style="width:100%;">
    <div class="brand_title"  style="width:90%;height:25px;line-height:25px;    font-size: 13px;margin:0 auto;">
      品牌介绍：
    </div>
    <div class="brand_content" style="width:90%;line-height:25px;    font-size: 13px;margin:0 auto;">
      {{ $shop_detail['shop_brief'] }}
    </div>
</div>
<div class="all_ms">
     @foreach ($product_list as $product)
    <a class="goodsItem" href="/mobile/product/detail/{{ $product['pro_id'] }}"> 
        
        <div  class="img-box">
            <div class ="pic">
                 <img src="{{$product['image'] }}"  class="goodsimg">
            </div>
            <div class="goods-brief">
                <div class="gos-title">{{ $product['goods_name'] }}
           
	        <font class="shop_s"></font>
    	  
        </div> 
                <div class="brief">
               <!--{{str_limit($product['goods_brief'],20,'....')}} -->
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