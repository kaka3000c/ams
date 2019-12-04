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
    <link href="/css/hotle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script src="/js/jquery-3.2.1.min.js"></script>
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
 <script src="/layer_mobile/layer.js"></script>
<script>
    $(document).ready(function(){
           $(".recharge").click(function(){
               alert("339900");
               var recharge_money= $("#recharge_money").val();
                alert(recharge_money);
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/mobile/recharge/recharge',
                    data: {recharge_money:recharge_money},
                    dataType: 'json',
                    async : 'false',    //同步
                    success: function(data){
                        
                        console.log(data);
                        
                         if(data.status==1){
                             alert("充值成功");
                           console.log("提交成功");
                           window.location.reload();
                         }else if(data.status==0){
                             alert("充值失败");
                            console.log("内部提交失败");
                         }
                       },
                       error:function(data){
                            alert("充值失败");
                           console.log("外部提交失败");
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
<body>
    <div style="width:95%;margin:0 auto; height:55px; line-height:55px; ">
        账户余额: {{ $service_user['money'] }}元
        
    </div>
    <form action="/mobile/recharge/recharge" method="post" name="theForm" enctype="multipart/form-data" >
          {{ csrf_field() }}
    <div style="width:95%;margin:0 auto; height:35px; line-height:35px; font-size:13px; color:#a5a5a5">
       充值金额
        
    </div>
    <div style="width:95%;margin:0 auto;left:10%; height:35px; line-height:35px; font-size:13px; color:#a5a5a5">
       
           
        <input type="text" id="recharge_money" name="recharge_money" value="">
        </from>
    </div>
    <div style="width:95%;margin:0 auto; height:35px; line-height:35px; font-size:13px; color:#a5a5a5">
       充值300元可获赠:
        
    </div>
    <div style="width:95%;margin:0 auto; height:35px; line-height:35px; font-size:13px; color:#a5a5a5">
       充值说明:
       1.最终解析权归本公司所有。
    </div>
    <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
       
         <input type="submit" class="" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px; text-align: center;" value=" 充值 " />  
    </div>
    </form>
</body>
</html>