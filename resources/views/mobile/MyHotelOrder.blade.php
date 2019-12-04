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
   
            <title>订单列表</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
<div class="daohang" style="width:100%; height:35px; line-height:35px;">
    <ul>
        <a href="/mobile/HotelOrder/10"><li style="text-align: center;float:left;color:#c2c2c2;height:45px; line-height:45px;width:20%;">全部</li></a>
         <a href="/mobile/HotelOrder/0"> <li style="text-align: center;float:left;color:#c2c2c2;height:45px; line-height:45px;width:20%;">待付款</li></a>
         <a href="/mobile/HotelOrder/1">  <li style="text-align: center;float:left;color:#c2c2c2;height:45px; line-height:45px;width:20%;">配送中</li></a>
         <a href="/mobile/HotelOrder/2">   <li style="text-align: center;float:left;color:#c2c2c2;height:45px; line-height:45px;width:20%;">已完成</li></a>
          <a href="/mobile/HotelOrder/3">   <li style="text-align: center;float:left;color:#c2c2c2;height:45px; line-height:45px;width:20%;">已关闭</li></a>
    </ul>
</div>
<div style="width:97%; margin:0 auto;">
    
     @foreach ($hotel_order_list as $order)
     
     <div style="width:100%; margin:0 auto;clear:both;height:35px;">
          <div style="float:left;"> </div>
          <div style="float:left;">{{$order['goods_name'] }}</div>
            <div style="float:left;"> <img src="{{$order['image'] }}" style="height:23px;"></div>
          <div style="float:left;"> {{$order['shop_price'] }}</div>
          <div style="float:left;"> {{$order['buynum'] }}</div>
          
           @if ( $order['order_status'] === 0) <div style="float:left;">  待付款  </div>    @endif  
           @if ( $order['order_status'] === 1) <div style="float:left;">  配送中  </div>    @endif  
           @if ( $order['order_status'] === 2) <div style="float:left;">  已完成 </div>    @endif  
           @if ( $order['order_status'] === 3) <div style="float:left;">  已关闭  </div>    @endif  
           
           
           <div style="float:left;"> {{str_limit($order['created_at'],10,'')}}</div>
     </div>
     
     @endforeach
    
</div>
</html>