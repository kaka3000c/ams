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
        height:153px;
        margin-top: 45px;
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
       <title>茂名家居网 | 茂名家居在线网</title>
       <meta name="description" content="茂名家居网 | 茂名家居在线网">
       <meta name="keywords" content="茂名家居网 | 茂名家居在线网"> 
</head>
 @include('jiaju_mobile/header')
<div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            @foreach ($banner_list as $banner)
            <div class="swiper-slide"><a href='{{$banner->ad_link }}'><img src="{{$banner->image }}" alt="智能相机" class="goodsimg" height="168" width="100%"></a></div>
            @endforeach
        </div>
        
        <div class="swiper-pagination"></div>
    </div>
 <div style="width:100%;margin:0 auto; height:5px;"></div>
 <div class="swiper-container swiper1" style="margin-top:0px; display:none;">
        <div class="swiper-wrapper">
 <div class=" swiper-slide" style="width:100%;height:163px;margin:0 auto;">
     <div style="width:100%;height:163px;margin:0 auto;">
         <div style="width:20%;height:81px;float:left">
             <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/mmtt"><img src="http://www.0668zdm.com/storage/images/mmtt.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/mmtt">茂名头条</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/article_promo"><img src="http://www.0668zdm.com/storage/images/zdm.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/article_promo">优惠活动</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/second"><img src="http://www.0668zdm.com/storage/images/fc.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/second">房产</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/qiche"><img src="http://www.0668zdm.com/storage/images/qc.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/qiche">汽车</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/homefurnishing"><img src="http://www.0668zdm.com/storage/images/jjc.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/homefurnishing">家具城</a></div>
         </div>
         <div style="width:20%;height:66px;float:left">
             <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/popular"><img src="http://www.0668zdm.com/storage/images/jj.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/popular">本地爆款</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/education"><img src="http://www.0668zdm.com/storage/images/jy.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/education">教育</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/employ"><img src="http://www.0668zdm.com/storage/images/bdfw.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;"><a href="/mobile/employ/">招聘信息</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/jiaoyou"><img src="http://www.0668zdm.com/storage/images/zhjy.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/jiaoyou">征婚交友</a></div>
         </div>
          <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/nicefood"><img src="http://www.0668zdm.com/storage/images/mspd.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/nicefood">美食频道</a></div>
         </div>
         
         
      </div>
    
     
     
 </div>
   
        
        </div>
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
</script> 
 <ul style="   
}">
       @foreach ($product_list as $product)
       
      <li style="border-bottom:#f1f2f6 solid 1px; height:98px; width:96%;margin:0 auto;"> 
          <div class="article_title" style="width:66%;line-height:23px;height:98px;float:left;">
           <a href="/jiaju_mobile/product/detail/{{$product['pro_id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>  {{$product['goods_name']}}</a>
          
          </div>
          <div class="article_pic" style="width:33%;height:98px;float:left;
}"><a href="/jiaju_mobile/product/detail/{{$product['pro_id']}}">
              <img src="{{$product['image']}}"  class="goodsimg" width="96%" height="88" style="margin-top:5px;">
               </a>
          </div>
          
     </li>
    
      @endforeach
 </ul>
 @include('/jiaju_mobile/keep_record')
 @include('/jiaju_mobile/footer')
</html>