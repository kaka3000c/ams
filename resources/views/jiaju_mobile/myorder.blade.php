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
    <div style="width:100%;height:35px;line-height:35px;text-align:center;color:#06b901;font-size:22px;font-weight:bold;
         border-bottom:1px solid #d1d1d1;">我的订单</div>
    <ul style="   
        }">
        @foreach ($order_list as $order)

        <li style="border-bottom:#f1f2f6 solid 1px; height:128px; width:96%;margin:0 auto;"> 
            <div>
            <div class="article_pic" style="width:25%;height:98px;float:left;
                 }"><a href="/jiaju_mobile/order/detail/{{$order['order_id']}}">
                    <img src="{{$order['goods_img']}}"  class="goodsimg" style="margin-top:5px;width:88px;height:88px;">
                </a>
            </div>
            <div class="article_title" style="width:50%;line-height:23px;height:98px;float:left;">
                <a href="/jiaju_mobile/order/detail/{{$order['order_id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>{{$order['goods_name']}}  </a>

            </div>
            <div class="article_pic" style="width:25%;height:98px;float:left;
                 }">
                <div>
                    ￥{{$order['price']}}
                </div>
                 <div>
                    x{{$order['buynum']}}
                </div>
            </div>
            </div>
            <div style="height:30px;line-height:30px;text-align:right;">
                  共{{$order['buynum']}}件商品 合计{{$order['total_price']}}
            </div>
            <div>
                
            </div>
        </li>

        @endforeach
    </ul>









</html>





