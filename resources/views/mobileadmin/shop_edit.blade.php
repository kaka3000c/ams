<html>
    <head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<script>
    $(document).ready(function(){
           $(".submit").click(function(){
             
              var shop_id= $("#shop_id").val();
                var shop_name= $("#shop_name").val();
                var mobile= $("#mobile").val();
                var weixing= $("#weixing").val();
                var address= $("#address").val();
                var shop_brief= $("#shop_brief").val();
                var contact = $("#contact").val();
                        
                 $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/mobile/shopadmin/update',
                    data: {shop_id:shop_id,shop_name:shop_name,mobile:mobile,weixing:weixing,address:address,shop_brief:shop_brief,contact:contact},
                    dataType: 'json',
                    async : 'false',    //同步
                    success: function(data){
                        
                        
                        layer.open({
                        title: '温馨提示',
                        area: ["80px", "60px"],
                        content: data.msg,
                        btn: ["确认"],
                        yes: function (index, layero) {
                             window.location.href="/mobile/shopadmin/edit";
                              }
                        });   
                         if(data.status==1){
                           //  window.location.reload();
                           console.log("兑换成功");
                          
                           
                         }else if(data.status==0){
                            console.log("内部兑换失败");
                         }
                       
                       },
                       error:function(data){
                           console.log("外部兑换失败");
                       }
                });
                
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

<div style="width:100%;height:50px;line-height:50px;text-align:center;  background-color:#f30000;color:#fff;" >店铺资料编辑</div>
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
             <div style="width:65px;height:65px;float:left;border-radius:4px;" >
                 
                  <a href="/mobile/shopadmin/logo_edit"> <img src="{{$shop['shop_logo']}}" style="width:65px;height:65px;" ></a>
             </div>
               <div style="height:65px;float:left;">点击左边图片修改logo</div>
         </div>
         
     </div>
     
    <div style="width:300px;margin:0 auto;">
    
    <form action="/mobile/shopadmin/update" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <table width="100%" id="general-table">
        
    <tr>
      <td  class="label">
        商家名称</td>
      <td>
        <input type="hidden" name="shop_id" id="shop_id" value="{{$shop['shop_id']}}" size="35" />
        <input type="text" name="shop_name" id="shop_name" value="{{$shop['shop_name']}}" size="35" 
               style="border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;"/>
       
      </td>
    </tr>
     <tr>
      <td  class="label">手机号码</td>
      <td>
        <input type="text" name="mobile" id="mobile" value="{{$shop['mobile']}}" size="35" style="border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;"/>
      </td>
    </tr>
          <tr>
      <td  class="label">微信号</td>
      <td>
        <input type="text" name="weixing"  id="weixing" value="{{$shop['weixing']}}" size="35" style="border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;"/>
      </td>
    </tr>
     <tr>
      <td  class="label">联系人</td>
      <td>
        <input type="text" name="contact"  id="contact" value="{{$shop['contact']}}" size="35" style="border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;"/>
      </td>
    </tr>
            <tr>
      <td  class="label">地址</td>
      <td>
        <input type="text" name="address" id="address" value="{{$shop['address']}}" size="35" style="border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;"/>
      </td>
    </tr>   
          <tr>
      <td  class="label">简介</td>
      <td>
        
         <textarea name="shop_brief" id="shop_brief" cols="40" rows="3" style="border:1px solid #d8d8d8; height:100px;line-height:35px;box-shadow:0px #ffffff;">{{$shop['shop_brief']}}</textarea>
      </td>
    </tr>  
    </table> 
    </form>
    
    </div>

</div>
 <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
       
         <input type="submit" class="submit" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;" value=" 修改 " />  
    </div>
</html>