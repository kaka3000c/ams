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
<script src="/js/jquery-3.2.1.min.js"></script>
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
</script>
<script type="text/javascript" src="js/index.js"></script>
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
 <div class="swiper-container swiper1" style='margin-top:55px;'>
        <div class="swiper-wrapper">
            @foreach ($banner_list as $banner)
            <div class="swiper-slide"><a href='{{$banner->ad_link }}'><img src="{{$banner->image }}" alt="智能相机" class="goodsimg" height="90" width="100%"></a></div>
            @endforeach
        </div>
        
        <div class="swiper-pagination"></div>
    </div>
 <div style="width:100%; margin:0 auto;height:215px;">
      @foreach ($marriage_user_list as $user)
     <div style="width:49%;float:left;">
         <div style="height:180px;"><img src="{{ $user['touxiang']}}" style="width:180px;height:180px;"></div>
         <div style="height:35px;"> {{ $user['nickName']}}   <span>{{$user['birthday']}}岁</span> </div>
     </div>
     @endforeach
   
     
 </div>
<div style="width:100%;height:285px;"></div>
 @include('mobile/footer')
</html>