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
              
                var pro_id= $("#pro_id").val();
                
                 $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/mobile/HotelWeixingProduct/insert/'+pro_id,
                    data: {pro_id:pro_id},
                    dataType: 'json',
                    async : 'false',    //同步
                    success: function(data){
                        
                        console.log(data);
                        //alert(data.msg);
                        layer.open({
                        title: '温馨提示',
                        area: ["80px", "60px"],
                        content: data.msg,
                        btn: ["确认", "取消"],
                        yes: function (index, layero) {
                              window.location.reload();
                              }
                        });     
  
                         if(data.status==1){
                           //  window.location.reload();
                           console.log("购买成功");
                           
                           
                         }else if(data.status==0){
                            console.log("内部购买失败");
                         }
                       },
                       error:function(data){
                           console.log("外部购买失败");
                       }
                });
                
          });
      });
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
   
            <title>卡劵中心</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
<div>卡劵中心</div>
<div class="daohang" style="width:100%;  line-height:60px;position:fixed; bottom: 0px; width:100%;background: #fff; height:60px;
     border:#c2c2c2 solid 1px;">
<ul>
    <a href="/mobile/HotelCouponRec/"><li style="text-align: center;float:left;color:#c2c2c2;height:60px; line-height:60px;width:50%;">卡劵中心</li></a>
    <a href="/mobile/HotelCouponRec/mycoupon"> <li style="text-align: center;float:left;color:#c2c2c2;height:60px; line-height:60px;width:50%;">我的卡劵</li></a>
</ul>
</div>

</html>