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
    var wstitle =  "{{ $employ_detail['title'] }}"; //此处填写分享标题
    var wsdesc = "{{ $employ_detail['title'] }}"; //此处填写分享简介
    var wslink = "{{ $surl }}"; //此处获取分享链接
    var wsimg = "http://www.0668zdm.com/storage/images/ping.jpg"; //此处获取分享缩略图

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
   
            <title>{{ $employ_detail['title'] }}-- 茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="{{ $employ_detail['title'] }}-- 茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="{{ $employ_detail['title'] }}-- 茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
 @include('mobile/header')

 

 
    
 <article class="article" style='margin-top: 85px;padding-bottom: 10px;'>
   <div style="text-align:center; font-size:18px; font-weight:bold;margin:8px 0 8px 0;">{{ $employ_detail['title'] }}</div>
   <div>{!! $employ_detail['content'] !!}</div>
   <div style="text-align: right; color: #bfbfbf;"></div>
 </article>
 <div style="text-align: left; color: #bfbfbf;">转自{!! $employ_detail['source'] !!}，侵删</div>
  <div style="height:85px;text-align:center;">   <img src="http://www.0668zdm.com/storage/images/gzh_logo.jpg" style="width: 85px;height:85px"></div>
 <div style="height:25px;text-align:center;">关注我们公众号</div>
 <div style="height:25px;text-align:center;">点击菜单进入这个网站</div>
 <ul >
       @foreach ($employ_list as $employ)
       
      <li style="border-bottom:#f1f2f6 solid 1px; height:55px; width:96%;margin:0 auto;"> 
          <div class="article_title" style="width:90%;line-height:23px;height:55px;margin:0 auto;">
           <a href="/mobile/employ/detail/{{$employ['id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>  {{$employ['title']}}</a>
          </div>
     </li>
    
      @endforeach
 </ul>
 <div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  font-size:18px;font-weight:900;">新房</div>
  <ul style="  
}">
       @foreach ($new_house_list as $product)
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
 <div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  font-size:18px;font-weight:900;">二手房</div>
  <ul style="  
}">
       @foreach ($second_house_list as $product)
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
<div style=" width:90%;margin:0 auto; height:55px;line-height:55px; font-size:18px;font-weight:900;">租房</div>
  <ul style="  
}">
       @foreach ($rent_house_list as $product)
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
<div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  font-size:18px;font-weight:900;">茂名头条</div>
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
  <div class="pindao" style="width:100%;margin:0 auto;">
     <div style="width:100%;height:81px;margin:0 auto;">
         <div style="width:20%;height:81px;float:left">
             <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/mmtt"><img src="http://www.0668zdm.com/storage/images/mmtt.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/mmtt">茂名头条</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/article_promo"><img src="http://www.0668zdm.com/storage/images/zdm.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/article_promo">优惠活动</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/fc"><img src="http://www.0668zdm.com/storage/images/fc.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/fc">房产</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/qiche"><img src="http://www.0668zdm.com/storage/images/qc.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/qiche">汽车</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/shop_list"><img src="http://www.0668zdm.com/storage/images/jjc.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/shop_list">家具城</a></div>
         </div>
      </div>
     <div style="width:100%;height:81px;margin:0 auto;">
         <div style="width:20%;height:66px;float:left">
             <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/popular"><img src="http://www.0668zdm.com/storage/images/jj.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/popular">爆款</a></div>
         </div>
         <div style="width:20%;height:81px;float:left">
              <div style="width:55px;height:55px;margin:0 auto;"><a href="/mobile/jiaoyu"><img src="http://www.0668zdm.com/storage/images/jy.png" ></a></div>
             <div style="width:55px;height:26px;margin:0 auto;font-size:13px;text-align:center;"><a href="/mobile/jiaoyu">教育</a></div>
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
  @include('mobile/keep_record')
  @include('mobile/footer')
</html>
