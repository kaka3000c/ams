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
           $(".exchange").click(function(){
              
                var pro_id= $("#pro_id").val();
                
                 $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/mobile/HotelScoreProduct/exchange',
                    data: {pro_id:pro_id},
                    dataType: 'json',
                    async : 'false',    //同步
                    success: function(data){
                        
                        
                        layer.open({
                        title: '温馨提示',
                        area: ["80px", "60px"],
                        content: data.msg,
                        btn: ["确认"],
                        yes: function (index, layero) {
                             window.location.href="/mobile/HotelScoreOrder";
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
   
            <title>茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>


    
</div>
<div style="width:95%;margin:0 auto;">
     
    <div style="width:80%;margin:0 auto;margin-top:15px;">
        
       <img height="200" src="{{ $product['image'] }}" />
       
    </div >
    <div style="width:80%;margin:0 auto;height:30px;line-height:30px;text-align:center;">{{ $product['goods_name'] }}
    <input type="hidden" id="pro_id" name="pro_id" value="{{ $product['pro_id'] }}">
    </div >
    <div style="width:80%;margin:0 auto;height:30px;line-height:30px;text-align:center;">{{ $product['exchange_points'] }}积分</div >
    <div style="width:80%;margin:0 auto;">
         {!! $product['content'] !!}
    </div>
</div>

 <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
       
         <input type="submit" class="exchange" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;" value=" 兑换商品 " />  
    </div>
 
</html>