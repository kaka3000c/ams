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

 <form name="theForm" method="post" enctype="multipart/form-data" action="/mobile/order/insert/{{$id}}">
      {{ csrf_field() }}
    <div class="order">
       <div class="order_contact">订单联系人</div>
        <div class="order_username"> 姓名： <input id="username" class="form-input" type="text" name="username" value="" placeholder="请输入姓名"></div>
        <div class="order_mobile"> 手机： <input id="mobile" class="form-input" type="text" name="mobile" value="" placeholder="请输入手机"></div>
        <div class="order_address">地址： <input id="address" class="form-input" type="text" name="address" value="" placeholder="请输入地址"></div>
   <div class="order_buynum">购买数量： <input id="buynum" class="form-num" type="text" name="buynum" value="" placeholder="数量"></div>
   <div class="order_remarks">备注： 
       
       <textarea  id="oremarks" name="remarks"  cols="" rows="" placeholder="请输入备注" class="form-text"></textarea>

     
   
   </div>
   
    
    </div>

    
    
<footer class="footer"> 
  
   <div class="">
       <button type="submit"  class="yixiang">提交订单</button>
       
    </div>


 
</footer>
</form>
</html>
    
    
    
    

