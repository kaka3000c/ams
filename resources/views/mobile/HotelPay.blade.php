<html>
    <head>
    
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">
     <meta name="csrf-token" content="{{ csrf_token() }}">
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
<script src="/layer_mobile/layer.js"></script>
<script>
    $(document).ready(function(){
            $(".buy").click(function(){
           WeixinJSBridge.invoke(
       'getBrandWCPayRequest',<?= $json ?>,
       function(res){
           if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                // 使用以上方式判断前端返回,微信团队郑重提示：
                // res.err_msg将在用户支付成功后返回
                // ok，但并不保证它绝对可靠。
           }
       }
   );
   });
   
      });
</script>
  <script>



</script>         
     <style>
    .swiper-container {
        width: 100%;
        height:168px;
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
<title>微信支付</title>
<meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
<meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">

</head>


<div style="width:95%;margin:0 auto;height: 30px;line-height:30px; border-bottom:1px solid #f1f1f1;">店铺名称1</div>

<div style="width:95%;margin:0 auto;height:118px;border-bottom:1px solid #f1f1f1;margin-top: 5px;clear:both;">
    <div  style="width:113px;margin:0 auto;height:113px;float:left;">
        
           <img height="113px" src="{{ $image }}" style="width:100%;" />
           
    </div>
    
    <div  style="margin:0 auto;height:113px;float:left;margin-left:5px;">
         <div>{{ $goods_name }}</div>
        
         <div>￥{{ $shop_price }}</div>
    </div>
</div>

<div style="width:95%;margin:0 auto;clear:both;text-align: right;height: 30px;line-height:30px;border-bottom:1px solid #f1f1f1;margin-top: 5px;">
    购买数量：{{ $buynum }}
</div>
<div style="width:95%;margin:0 auto;clear:both;text-align: right;height: 30px;line-height:30px;border-bottom:1px solid #f1f1f1;">
    实付金额：￥{{ $pay_price }}
</div>
<div style="width:95%;margin:0 auto;heigth:113px;clear:both;height: 30px;line-height:30px;border-bottom:1px solid #f1f1f1;">
    <img src="http://www.0668zdm.com/storage/images/weixing_pay.jpg" height="26">微信支付(推荐)
</div>


<div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
   
    <input type="submit" class="buy" style="width:98%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px; text-align: center;-webkit-appearance: none;border:0px;float:left;margin-left:6px; " value=" 立即支付 " /> 
    
</div>


</html>