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
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script src="/js/jquery-3.2.1.min.js"></script>
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/layer_mobile/layer.js"></script>

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

<div style="width:100%;height:50px;line-height:50px;text-align:center;  background-color:#f30000;color:#fff;" >店铺LOGO编辑</div>
<div style="background-image: url(http://www.0668zdm.com/storage/images/shop_bg.png);background-position:top center;width:100%;
      min-height:500px;
     background-size:100% 155px;
background-repeat:no-repeat;" >
    <div style="width:97%;margin:0 auto;height:43px;border-radius:4px; 
          ">
         
     </div>

     <div style="width:93%;margin:0 auto;min-height:135px;border-radius:7px; background-color:#fff;  ">
         
         <div style="width:97%;margin:0 auto;height:35px;">
         
         </div>
         <div  style="width:97%;margin:0 auto;">
             <div style="width:25px;height:25px;float:left;border-radius:4px;" >
                 
                   <img src="{{$shop['shop_logo']}}" style="width:65px;height:65px;" >
             </div>
               <div style="height:65px;float:left;"></div>
         </div>
         
     </div>
     
    <div style="width:300px;margin:0 auto;">
    
    <form action="/mobile/shopadmin/logo_update" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <table width="100%" id="general-table">
        
    <tr>
      <td  class="label">
        商家logo</td>
      <td>
        <input type="hidden" name="shop_id" id="shop_id" value="{{$shop['shop_id']}}" size="35" />
       
       
      </td>
    </tr>
      <tr>
      <td  class="label">商家logo</td>
      <td>
          @if ( $shop['shop_logo'])<img src="{{$shop['shop_logo']}}" style="width:35px;"   />@endif   
           @if ( !$shop['shop_logo'])logo图片没有上传  @endif   
      </td>
    </tr>
      <tr>    
      <td  class="label">
       上传新的商家logo图片</td>
      <td>
        <input name="shop_logo" type="file" />
     </td>
    </tr>
    </table> 
     <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
       
         <input type="submit" class="submit" value="上传图片"  style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;"  /> 
    </div>
    
    </form>
    
    </div>

</div>

</html>