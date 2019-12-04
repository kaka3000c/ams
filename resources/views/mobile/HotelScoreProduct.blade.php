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

<div style="width:95%;height:35px;line-height:35px;margin:0 auto;">  
    剩余积分:  {{$service_user['score'] }}积分          <a href="/mobile/HotelScoreOrder" style="float:right;width:96px;display:block;">  兑换纪录 > </a>
</div>
    
    
</div>
<div style="width:95%;margin:0 auto;">
     @foreach ($product_list as $product)
    <a class="goodsItem" href="/mobile/HotelScoreProduct/detail/{{ $product['pro_id'] }}"> 
        
        <div style="width:49%;float:left; border:solid 1px #e5e5e5; border-radius:8px;" >
             <div >
                 <img src="{{$product['image'] }}"  style="width:100%;height:150px;">
             </div>
             <div >{{ $product['goods_name'] }}</div >
                 
             <div >{{ $product['exchange_points'] }}积分</div >
    	  
        </div> 
            
                
           
    
	
	 
  </a>
@endforeach
  
   
 
  
</div>

</html>