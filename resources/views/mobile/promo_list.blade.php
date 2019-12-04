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
 @include('mobile/header')
  <div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  margin-top: 45px;font-size:18px;font-weight:900;">优惠头条</div>
  <ul style="  
}">
           @foreach ($article_list as $article)
     <li style="border-bottom:#f1f2f6 solid 1px; height:98px; width:96%;margin:0 auto;"> 
          <div class="article_title" style="width:66%;line-height:23px;height:98px;float:left;">
           <a href="/mobile/article/{{$article['article_id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>  {{$article['title']}}</a>
          
          </div>
          <div class="article_pic" style="width:33%;height:98px;float:left;
}"><a href="/mobile/article/{{$article['article_id']}}">
              <img src="{{$article['image']}}"  class="goodsimg" width="96%" height="88" style="margin-top:5px;">
               </a>
          </div>
          
     </li>
      @endforeach
 </ul>
 <div style=" width:90%;margin:0 auto; height:55px;line-height:55px;font-size:18px;font-weight:900;">其他优惠</div>
 <ul style=" width:90%;margin:0 auto; height:78px;">
       @foreach ($promo_list as $promo)
      <li style="height:78px;margin-top:8px;border-bottom:#d6d6d6 solid 1px; "> 
          
          
          <div class="article_pic" style="width:20%;height:78px;float:left;">
           <a href="http://www.0668zdm.com/{{$promo['images']}}" style="display:block;">  
               <div class="zoomImage" style="background-image:url({{$promo['images']}}); width:100%;
    height:0;
    padding-bottom: 100%;
    overflow:hidden;
    background-position: center center;
    background-repeat: no-repeat;
    -webkit-background-size:cover;
    -moz-background-size:cover;
    background-size:cover;">
               </div>  
           </a>
          </div>
          <div class="article_title" style="width:76%;line-height:18px;max-width:300px;height:78px;float:right;color:#8e8e8e;">
           <a href="/mobile/promoinfo/detail/{{$promo['id']}}" style="text-decoration:none;color:#333333;">    {{$promo['title']}}</a>
          
          </div>
          
     </li>
      @endforeach
 </ul>
 @include('mobile/keep_record')
 @include('mobile/footer')
</html>