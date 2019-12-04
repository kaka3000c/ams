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
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: 'wx8c55f8bae39de381', // 必填，公众号的唯一标识
                timestamp: "{{ $ws["timestamp"] }}", // 必填，生成签名的时间戳
                nonceStr: '{{ $ws["nonceStr"] }}', // 必填，生成签名的随机串
                signature: '{{ $ws["signature"] }}',// 必填，签名，见附录1
                jsApiList: [
                        'checkJsApi',
                        'onMenuShareTimeline',
                        'onMenuShareAppMessage',
                        'onMenuShareQQ',
                        'onMenuShareWeibo'
                ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
    var wstitle =  "{{  $product_detail['goods_name']  }}"; //此处填写分享标题
    var wsdesc = "{{  $product_detail['goods_name']  }}"; //此处填写分享简介
    var wslink = "{{ $surl }}"; //此处获取分享链接
    var wsimg = "http://www.0668zdm.com/{{ $product_detail['image'] }}"; //此处获取分享缩略图

</script>
<script src="/js/wxshare.js"></script>
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
   
            <title>{{  $product_detail['goods_name']  }} -- 茂名家居网 | 茂名家居在线网</title>
        <meta name="description" content="{{  $product_detail['goods_name']  }} -- 茂名家居网 | 茂名家居在线网">
        <meta name="keywords" content="{{  $product_detail['goods_name']  }} -- 茂名家居网 | 茂名家居在线网">
    
 
    
</head>
 @include('jiaju_mobile/header')


<div class="detail-banner" style="  margin-top:55px;">
           <img src="{{ $product_detail['image'] }}" alt="" style="width:80%;" />
        </div>
<div class="details-title details-title-haojia z-clearfix">
    <h1>{{  $product_detail['goods_name'] }}</h1>
    
    
</div>
  @if ($is_sale == 0)

  @endif

 <article class="article">
 
   {!! $product_detail['content'] !!}
 </article>


 <div class="shop">
        @foreach ($shop_detail as $shop)  
        <a href="/mobile/shop/{{ $shop->shop_id }}">
    <div class="shop_logo"> <img src="{{ $shop->shop_logo }}"  class="goodsimg"></div>
    <ul class="shop_detail">
      <li style="line-height:22px;">  实体店名称：{{ $shop->shop_name }}</li>
       <li style="line-height:22px;">  实体店地址：{{ $shop->address }}</li>
       <li style="line-height:22px;">  手机：{{ $shop->mobile }}</li>
       <li style="line-height:22px;">  微信：{{ $shop->weixing }}</li>
            
    </ul>
    
    </a>
    @endforeach  
</div>
  <div class="tip"  style="  margin-top:15px;">
 
 </div>
 <div style="text-align: center; color: #ff003c;">点击右上角分享给朋友或朋友圈</div>
 <div style="height:85px;text-align:center;">   <img src="http://www.0668zdm.com/storage/images/mmjjw_qr_code.jpg" style="width: 85px;height:85px"></div>
 <div style="height:25px;text-align:center;">关注公众号</div>
 <div style="height:25px;text-align:center;">从公众号打开网站，知道最新爆款</div>
<div style="height:150px;text-align:center;">   <img src="http://www.0668zdm.com/storage/images/mmjjw.jpg" style="height:150px"></div>
  <div style="height:230px;text-align:center;">   <img src="http://www.0668zdm.com/storage/images/tuiguang.jpg" style="height:230px"></div>
 




<div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  font-size:18px;font-weight:900;">本地爆款</div>
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
<div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  font-size:18px;font-weight:900;">家居生活</div>
  <ul >
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
  @include('/jiaju_mobile/prodcut_detail_footer')
</html>
