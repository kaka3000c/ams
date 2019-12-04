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
 <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" ></script>

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

        <title>教育频道 | 茂名值得买 </title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">



    </head>
    @include('mobile/header')
     <ul style=" margin-top:38px; 
}">
       @foreach ($product_list as $product)
     <li style="border-bottom:#f1f2f6 solid 1px; height:98px; width:96%;margin:0 auto;"> 
          <div class="article_title" style="width:66%;line-height:23px;height:98px;float:left;">
           <a href="/mobile/product/detail/{{$product['pro_id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>  {{$product['goods_name']}}</a>
          
          </div>
          <div class="article_pic" style="width:33%;height:98px;float:left;
}"><a href="/mobile/product/detail/{{$product['pro_id']}}">
              <img src="{{$product['image']}}"  class="goodsimg" width="96%" height="88" style="margin-top:5px;">
               </a>
          </div>
          
     </li>
      @endforeach
 </ul>
    @include('mobile/keep_record')
    @include('mobile/footer')
</html>