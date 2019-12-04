<html>
    <head>
    
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">
     <meta name="csrf-token" content="{{ csrf_token() }}">
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
<script src="/layer_mobile/layer.js"></script>

           
     <style>
    .swiper-container {
        width: 100%;
        height:168px;
        margin-top: 85px;
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


    
<form action="/mobile/HotelOrder/ConfirmHotelOrder" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
<div style="width:95%;margin:0 auto;">
     
    <div style="width:80%;margin:0 auto;margin-top:15px;">
        
       <img height="200" src="{{ $product['image'] }}" />
       
    </div >
    <div style="width:80%;margin:0 auto;height:30px;line-height:30px;text-align:center;">{{ $product['goods_name'] }}
    <input type="hidden" id="pro_id" name="pro_id" value="{{ $product['pro_id'] }}">
    </div >
    <div style="width:80%;margin:0 auto;height:30px;line-height:30px;text-align:center;">¥{{ $product['shop_price'] }}元</div >
    <div style="width:80%;margin:0 auto;">
         {!! $product['content'] !!}
    </div>
    <div style="width:80%;margin:0 auto;">
         <input type="hidden" id="goods_name" name="goods_name" value="{{ $product['goods_name'] }}">
          <input type="hidden" id="shop_price" name="shop_price" value="{{ $product['shop_price'] }}"> 
           <input type="hidden" id="image" name="image" value="{{ $product['image'] }}"> 
    </div>
</div>

<div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
   
    <input type="submit" class="" style="width:98%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px; text-align: center;-webkit-appearance: none;border:0px;float:left;margin-left:6px; " value=" 购买商品 " /> 
    
</div>
</form>
</html>