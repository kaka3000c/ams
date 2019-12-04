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
   
            <title>饭店门店列表</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
 <div style="width:97%; margin:0 auto;clear:both;height:35px;line-height:35px;">
          
          <div style="float:left;width: 25%;">店名称</div>
            <div style="float:left;width: 25%;">  店logo</div>
          <div style="float:left;width: 25%;"> 地址</div>
          <div style="float:left;width: 25%;">电话</div>
          
         
     </div>
<div style="width:97%; margin:0 auto;">
    
     @foreach ($hotel_store_list as $hotel_store)
     
     <div style="width:100%; margin:0 auto;clear:both;height:35px;line-height:35px;">
          
          <div style="float:left;width: 25%;">{{$hotel_store['name'] }}</div>
            <div style="float:left;width: 25%;"> <img src="{{$hotel_store['logo'] }}" style="height:35px;line-height:35px;"></div>
          <div style="float:left;width: 25%;"> {{$hotel_store['address'] }}</div>
          <div style="float:left;width: 25%;"> {{$hotel_store['mobile'] }}</div>
          
         
     </div>
     
     @endforeach
    
</div>
</html>