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
    var wstitle =  "{{ $shop_detail['shop_name'] }}"; //此处填写分享标题
    var wsdesc = "{{ $shop_detail['shop_name'] }}"; //此处填写分享简介
    var wslink = "{{ $surl }}"; //此处获取分享链接
    var wsimg = "http://www.0668zdm.com/{{$shop_detail['shop_logo'] }}"; //此处获取分享缩略图

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
   
            <title>{{ $shop_detail['shop_name'] }}-茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="{{ $shop_detail['shop_name'] }}-茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="{{ $shop_detail['shop_name'] }}-茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
 @include('mobile/header')
<div class="shop" style="margin-top:49px;">
    <div class="shop_logo"> <img src="{{$shop_detail['shop_logo'] }}"  class="goodsimg"></div>
    <ul class="shop_detail">
      <li style="line-height: 18px;">  实体店名称：{{ $shop_detail['shop_name'] }}</li>
       <li style="line-height: 18px;">  实体店地址：{{ $shop_detail['address'] }}</li>
       <li style="line-height: 18px;">  手机：{{ $shop_detail['mobile'] }}</li>
       <li style="line-height: 18px;">  微信：{{ $shop_detail['weixing'] }}</li>
            
    </ul>
    
</div>
 <div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            @foreach ($banner_list as $banner)
            <div class="swiper-slide"><a href='{{$banner['shop_banner_id'] }}'><img src="{{$banner['image'] }}" alt="智能相机" class="goodsimg" height="168" width="100%"></a></div>
            @endforeach
        </div>
        
        <div class="swiper-pagination"></div>
    </div>
<div class="brand" style="width:100%;">
    <div class="brand_title"  style="width:90%;height:25px;line-height:25px;    font-size: 13px;margin:0 auto;">
      品牌介绍：
    </div>
    <div class="brand_content" style="width:90%;line-height:25px; line-height: 18px;   font-size: 13px;margin:0 auto;">
      {{ $shop_detail['shop_brief'] }}
    </div>
</div>
<div class="all_ms">
     @foreach ($product_list as $product)
    <a class="goodsItem" href="/mobile/product/detail/{{ $product['pro_id'] }}"> 
        
        <div  class="img-box">
            <div class ="pic">
                 <img src="{{$product['image'] }}"  class="goodsimg">
            </div>
            <div class="goods-brief" >
                <div class="gos-title" style="padding-bottom: 10px;line-height: 18px;">{{ $product['goods_name'] }}
                </div> 
                <div>
                   
                </div>
                <div class="brief">
               <!--{{str_limit($product['goods_brief'],20,'....')}} -->
                </div>
                  
            </div>
        
        </div>
        
    
	
	 
  </a>
@endforeach
  
 <div class="" style="width:100%;height:80px;">  
 
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
 @include('mobile/footer')
</html>