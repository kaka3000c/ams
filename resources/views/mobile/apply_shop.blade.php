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
              alert('3423');
                var shop_name= $("#shop_name").val();
                var mobile= $("#mobile").val();
                var contact= $("#contact").val();
                
                        
                 $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/mobile/shopadmin/submit_apply_shop',
                    data: {shop_name:shop_name,mobile:mobile,contact:contact},
                    dataType: 'json',
                    async : 'false',    //同步
                    success: function(data){
                        
                        
                        layer.open({
                        title: '温馨提示',
                        area: ["80px", "60px"],
                        content: data.msg,
                        btn: ["确认"],
                        yes: function (index, layero) {
                             window.location.href="/mobile/shopadmin/";
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


<div>

<form action="/mobile/shopadmin/submit_apply_shop" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <table width="100%" id="general-table">
        <tr>
      <td  class="label">
        商家名称</td>
      <td>
        <input type="text" name="shop_name" value="" size="35" />
     </td>
    </tr>
      <tr>
      <td  class="label">手机号码</td>
      <td>
        <input type="text" name="mobile" value="" size="35" />
      </td>
    </tr>
     <tr>
      <td  class="label">联系人</td>
      <td>
        <input type="text" name="contact" value="" size="35" />
      </td>
    </tr>
    </table>
</form>
</div>
 <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
       
         <input type="submit" class="submit" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;" value=" 提交申请 " />  
    </div>

</html>