<html>
    <head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--PWA-->
<link href="/css/mobile.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script src="/js/jquery-3.2.1.min.js"></script>
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>

<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
 <script src="/layer_mobile/layer.js"></script>
 
 <script>
     $(document).ready(function(){

       $(".receive_btn").click(function(){
        layer.alert("333555");
       
      });
 
     });
 </script>
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
        <title>茂名家居网 | 茂名家居在线网</title>
        <meta name="description" content="茂名家居网 | 茂名家居在线网">
        <meta name="keywords" content="茂名家居网 | 茂名家居在线网">
</head>

<div class="user_data" >
    <div class="head"> 
     <img src="{{ $headimgurl }}" width="60">
        
    </div>
    <div  class="mobile">
   {{ $nickname }}
    </div>
</div>
<div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            @foreach ($banner_list as $banner)
            <div class="swiper-slide"><a href='{{$banner->ad_link }}'><img src="{{$banner->image }}" alt="智能相机" class="goodsimg" height="168" width="100%"></a></div>
            @endforeach
        </div>
        
        <div class="swiper-pagination"></div>
    </div>
<div style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    我的优惠劵 <span>查看全部</span>
</div>
<div class="coupon_center" style="height:50px">
     
   @foreach ($coupon_list as $coupon) 
   <div class="coupon_box" style="width:30%">
       
         <div class="coupon_box_left" style="width:80%">
               <div class="fuhao" style="width:20%">￥</div>
                <div class="coupon_money" style="width:20%">{{ $coupon['coupon_money'] }}</div>
                <div class="coupon_other" style="width:59%">
                     <div class="coupon_top">
                        {{ $coupon['coupon_name'] }}
                      </div>
                    <div class="coupon_bottom">
                        满{{ $coupon['full_money'] }}可用
                      </div>
                    
                </div>
         </div>
          <div class="coupon_box_right" style="width:19%">
              
               @if ( $coupon['rec']  === 0)
<!--               <a href="/mobile/couponrec/receive/{{ $coupon['coupon_id'] }}" class="receive_btn">领取</a>  -->
                <a href="#" class="receive_btn">领取</a>
               @endif
          
          
          @if ( $coupon['rec']  === 1) 
          
          使用
          
           @endif
              
              
              
         </div>
         
   </div>
     @endforeach
    
</div>
<div  style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a href="/jiaju_mobile/myshop/" >我的店铺</a>
</div>
<div  style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a href="/jiaju_mobile/shopadmin/" >店铺后台中心</a>
</div>
<div style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a href="/jiaju_mobile/order/myorder/">我的订单</a>
</div>
<div style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a href="/jiaju_mobile/address/">收货地址</a>
</div>
<div style="width:95%;margin:0 auto; height:35px; line-height:35px;border-bottom:solid #ededed 1px;">
    <a >收藏商品</a>
</div>

<div style="width:95%;margin:0 auto; height:35px; line-height:35px;border-bottom:solid #ededed 1px;">
    <a >关注店铺</a>
</div>
<div style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a >我的资金</a>
</div>
<div style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a href="/jiaju_mobile/recommend/">推荐给好友</a>
</div>
<div style="width:95%;margin:0 auto; height:35px;line-height:35px; border-bottom:solid #ededed 1px;">
    <a >我的店铺二维码</a>
</div>

<div style="width:95%;margin:0 auto; height:85px; ">
    
</div>
<!--<div class="logout">
    <a href="/mobile/logout">退出</a>
</div>-->
@include('jiaju_mobile/footer')
</html>