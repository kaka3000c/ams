<html>
    <head>
    
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">

    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link href="/css/mobile.css" rel="stylesheet" type="text/css" />
    <link href="/css/jy_mobile.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--PWA-->
    
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
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
   
            <title>茂名结婚网</title>
        <meta name="description" content="茂名结婚网">
        <meta name="keywords" content="茂名结婚网">
    
 
    
</head>
<header class="head_banner jy_header-top fixed" id="J_header_top">
   
    <div class="header-white">
        <div class="logo-img">
                    <div id="logo">
                        <a href="/"><img src="http://www.0668zdm.com/storage/images/hlw_logo.jpg"></a>
                    </div>
                </div>
        <div class="logo-search">
            
            <input type="text" name="search" placeholder="请输入关键词/呢称" id="J_enter_search">
        </div>
        
        
    </div>
    
    
</header>


<div class="jy_index_all_ms">
     @foreach ($user_list as $user)
    <a class="goodsItem" href="/mobile/product/detail/{{ $user['id'] }}"> 
        
        <div  class="img-box">
            <div class ="pic">
                 <img src="{{$user['touxiang'] }}"  class="goodsimg">
            </div>
            <div class="goods-brief">
                <div class="gos-title">{{ $user['jy_nickName'] }}
           
	        <font class="shop_s"></font>
    	  
        </div> 
                <div class="brief">
               
                </div>
                <div class="shop_name"> </div>
                <div class="shop_name"></div>
              
                
            </div>
        
        </div>
        
    
	
	 
  </a>
@endforeach
  
   
 
  
</div>
 @include('jy_mobile/footer')
</html>