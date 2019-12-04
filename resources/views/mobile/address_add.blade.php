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
<form action="/admin/address/insert" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <table width="100%" id="general-table">
      <tr>
      <td  class="label">
        收货人</td>
      </td>
      
       <td>
        <input type="text" name="consignee" value="" size="35" />
        
       </td>
     </tr>
       <tr>
      <td  class="label">
        手机号</td>
      </td>
      
       <td>
        <input type="text" name="mobile" value="" size="35" />
        
       </td>
     </tr>  
      <tr>
      <td  class="label">
        详细地址</td>
      </td>
      
       <td>
        <input type="text" name="address" value="" size="35" />
        
       </td>
     </tr>  
    </table>
</form>
<div class="add_address">
     <input type="submit" value=" 保存收货地址 " class="button" class="add_btn" style="width:130px; height:35px; line-height: 35px; background-color:#ff2572; display:block; color: #fff;
box-shadow:0px 0px 10px #ff2572; border-radius:10px;"/>
   
    
    
</div>




<!--<div class="logout">
    <a href="/mobile/logout">退出</a>
</div>-->
@include('mobile/footer')
</html>