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
    <link href="/css/hotle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script src="/js/jquery-3.2.1.min.js"></script>
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
 <script src="/layer_mobile/layer.js"></script>
 <script src="/js/jquery-3.2.1.min.js"></script>
 <script>
     $(document).ready(function(){

       $(".receive_btn").click(function(){
        layer.alert("333555");
       
      });
 
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
    <!-- SEO 相关 -->
   
            <title>茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
<body>
<div class="card" style="width:95%;height:201px; border: solid 1px #e8e8e8;border-radius:5px;box-shadow: 0px 0px 6px #e8e8e8;
     
     margin-top:5px;margin-left:auto;margin-right: auto; ">
    <div class="touxiang"> 
     <img src="{{ $headimgurl }}" width="50" style="border-radius: 28px;margin-top:15px; margin-left:15px;">
     </div>
     @if ( $service_user['auto_status'] === 0)
     <div  style="width:95%;height:160px;text-align: center;margin:0 auto;">
             <a href="/mobile/card">领取会员卡</a>
     </div>
     
     @endif 
     
     @if ( $service_user['auto_status'] === 1)
     
     <div style="width:95%;height:30px;text-align: center;margin:0 auto;">
         我的会员卡
     </div>
     <div style="width:95%;height:30px;text-align: center;margin:0 auto;">
        {{  $service_user['card_num'] }}
     </idv>
     @endif 
</div>


<div class="card_info" sytle="margin-top:15px;">
    <div class="card_info_box" style="width:33%;border-right: solid 1px #e8e8e8;float:left;">
        <div class="card_info_box_text" style="width:100%;text-align: center;height:37px;line-height: 37px;">余额</div>
        <div class="card_info_box_num" style="width:100%;text-align: center;height:37px;line-height: 37px;">
            {{ $service_user['money'] }}
            
        </div>
    </div>
    <div class="card_info_box" style="width:33%;border-right: solid 1px #e8e8e8;float:left;">
        <div class="card_info_box_text" style="width:100%;text-align: center;height:37px;line-height: 37px;">积分</div>
        <div class="card_info_box_num" style="width:100%;text-align: center;height:37px;line-height: 37px;"> {{ $service_user['score'] }}</div>
    </div>   
    <div class="card_info_box" style="width:33%;float:left;">
        <div class="card_info_box_text" style="width:100%;text-align: center;height:37px;line-height: 37px;">折扣</div>
        <div class="card_info_box_num" style="width:100%;text-align: center;height:37px;line-height: 37px;">无</div>
    </div>
</div>

<div style="width:100%;height:25px;clear:both;">    </div>

<div style="width:98%;height:28px;line-height:28px;margin:0 auto;text-indent:10px;font-size:18px;font-weight:1180;clear:both;">
    会员功能
</div>
<div class="function" sytle="width:98%; border:solid 1px #e8e8e8;margin:0 auto; ">
    <div class="function_box" style="width:25%;float:left; margin-top:8px;" >
        <a href="/mobile/recharge/">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/zxcz.gif" width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               在线充值
            </div>
            </a>
    </div>
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
        <a href="/mobile/HotelCouponRec/">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/wdkj.gif"  width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               我的卡劵
            </div>
            </a>
    </div>
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
         <a href="/mobile/HotelScoreProduct">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/zfsc.gif"  width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               积分商城
            </div>
             </a>
    </div>
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
         <a href="/mobile/HotelWeixingProduct">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/wxsc.gif" width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               微信商城
            </div>
             </a>
    </div>
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
        <a href="/mobile/HotelOrder/10">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/ddzx.gif"  width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               订单中心
            </div>
            </a>
    </div>
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
         <a href="/mobile/store/">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/symd.gif"  width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               适用门店
            </div>
         </a>
    </div>
    </div>
</div>
<div style="width:100%;height:25px;clear:both;">    </div>

<div style="width:98%;height:28px;line-height:28px;margin:0 auto;text-indent:10px;font-size:18px;font-weight:1180;clear:both;">
    获取积分
</div>
<div class="function" sytle="width:98%; border:solid 1px #e8e8e8;margin:0 auto; ">
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/hqzf.gif" width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center;font-size:13px;color:#736f6f;">
               获取积分
            </div>
    </div>
    <div class="function_box" style="width:25%;float:left; margin-top:8px;">
           <div class="function_box_image" style="width:100%;">
               <img src="/storage/images/hotel/zfsc.gif"  width="55" style="margin-left:20%;">
           </div>
            <div class="function_box_text" style="width:100%;text-align: center; font-size:13px; color:#736f6f;">
               积分商城
            </div>
    </div>
    
</div>
<div style="width:100%;height:25px;clear:both;">    </div>
</body>
</html>