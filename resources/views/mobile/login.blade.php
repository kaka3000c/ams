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
<header class="head_banner header-top fixed" id="J_header_top">
   
    <div class="header-white">
        <div class="logo-img">
                    <div id="logo">
                        <a href="/"><img src="http://www.0668zdm.com/storage/images/logo.jpg"></a>
                    </div>
                </div>
        <div class="logo-search">
            
            <input type="text" name="search" placeholder="搜索分类/品牌/商品" id="J_enter_search">
        </div>
        
        
    </div>
    <div class="header-tab">
         <div class="header-inner">
              <div class="channel-list">
                   <ul>
                        <li><a href="/mobile/category">水果</a></li>
                      <li><a href="/mobile/index">美食</a></li>
                      <li><a href="/mobile/index">手机</a></li>
                      <li><a href="/mobile/index">家纺</a></li>
                       <li><a href="/mobile/login">家具</a></li>
                  </ul> 
              </div>
         </div>
    </div>
    
</header>
<div class="login">  
  
   
    <form name="theForm" method="post" enctype="multipart/form-data" action="/mobile/login">
        {{ csrf_field() }}
         <div class="form-item">
             </div>
           <div class="form-item">
          @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    
             </div>
        <div class="form-item">
        <input id="mobile" class="form-input" type="text" name="mobile" value="" placeholder="请输入手机号码">
        </div>
        <div class="form-item">
            <input id="password" class="form-input" type="password" name="password" value="" placeholder="请输入密码" >
         </div>
          <div class="form-item">
        <button type="submit"  class="btn_login">登录</button>
         </div>
         <div class="form-tip">
         <a href="/mobile/reg/">还不是会员,去注册！</a>
         </div>

    </form>
    
</div>

 @include('mobile/footer')
</html>