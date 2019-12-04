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
<div style="width:100%;height:35px;line-height:35px;text-align:center;">提交订单</div>
 <form name="theForm" method="post" enctype="multipart/form-data" action="/jiaju_mobile/order/insert/{{$id}}">
      {{ csrf_field() }}
    <div >
       
        <div style="width:100%;height:35px;line-height:35px;margin-top: 8px;">
            <div style="width:22%;height:35px;line-height:35px;float:left;text-align: right;">  姓名：</div>
            <div style="width:70%;height:35px;line-height:35px;float:left;">
               <input id="username" class="form-input" type="text" name="username" value="{{$service_user['realname']}}" placeholder="请输入姓名">
            </div>
          
         </div>
        <div style="width:100%;height:35px;line-height:35px;margin-top: 8px;">
            <div style="width:22%;height:35px;line-height:35px;float:left;text-align: right;">手机：</div>
            <div style="width:70%;height:35px;line-height:35px;float:left;">
                <input id="mobile" class="form-input" type="text" name="mobile" value="{{$service_user['mobile']}}" placeholder="请输入手机">
            </div>
            
            
        </div>
        <div style="width:100%;height:35px;line-height:35px;margin-top: 8px;">
            <div style="width:22%;height:35px;line-height:35px;float:left;text-align: right;">   地址：</div>
            <div style="width:70%;height:35px;line-height:35px;float:left;">
                <input id="address" class="form-input" type="text" name="address" value="" placeholder="请输入地址"> 
            </div>
          
            
        </div>
   <div style="width:100%;height:35px;line-height:35px;margin-top: 8px;">
        <div style="width:22%;height:35px;line-height:35px;float:left;text-align: right;">   购买数量：</div>
            <div style="width:70%;height:35px;line-height:35px;float:left;">
                <input id="buynum" class="form-num" type="text" name="buynum" value="" placeholder="数量">
            </div>
       
       
   </div>
   <div style="width:100%;height:35px;line-height:35px;margin-top: 8px;">
       
        <div style="width:22%;height:35px;line-height:35px;float:left;text-align: right;">   备注：</div>
            <div style="width:70%;height:35px;line-height:35px;float:left;">
                 <textarea  id="oremarks" name="remarks"  cols="" rows="" placeholder="请输入备注" class="form-text"  style="height:100px;"   ></textarea>
            </div>
      

     
   
   </div>
   
    
 </div>
   
    


    
    
<footer style="width:100%;height:45px;line-height:45px;margin-top: 112px; position:fixed;

bottom:0;"> 
  
   <div class="">
       <button type="submit"  style="width:100%;height:45px;line-height:45px;background-color: #06b901;border:0px;
               color:#ffffff; font-size:18px;">提交订单</button>
       
    </div>


 
</footer>
</form>
</html>
    
    
    
    

