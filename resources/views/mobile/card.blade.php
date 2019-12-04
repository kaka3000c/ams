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

<title>会员开卡</title>
</head>
 <form name="theForm" method="post" enctype="multipart/form-data" action="/mobile/card/receive">
      {{ csrf_field() }}

<div style="width:95%;margin:0 auto;border-radius: 5px; background-color: #eb0f06; height:60px;line-height:60px;">
    俱乐部会员卡
</div>
<div style="width:95%;margin:0 auto;border-radius: 5px;">
    
    <div style="height:35px; line-height: 35px;"><span>真实姓名</span>
        <input id="realname" name="realname" value=""  style="height:35px; line-height: 35px;"></div>
      <div style="height:35px; line-height: 35px;"<span>手机号码</span>
          <input id="mobile" name="mobile" value=""  style="height:35px; line-height: 35px;"></div>
      
</div>   
    
<div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
       
         <input type="submit" class="exchange" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;" value=" 领取会员卡 " />  
    </div>      

</form>
</html>
    
    
    
    

