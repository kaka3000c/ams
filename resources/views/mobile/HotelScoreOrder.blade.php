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
   
            <title>积分兑换纪录</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
 <div style="width:97%; margin:0 auto;clear:both;height:35px;line-height:35px;">
          
          <div style="float:left;width: 20%;">商品名称</div>
            <div style="float:left;width: 20%;">  图片</div>
          <div style="float:left;width: 20%;"> 兑换积分</div>
          <div style="float:left;width: 20%;">订单状态</div>
           <div style="float:left;width: 20%;">创建时间</div>
         
</div>
<div style="width:97%; margin:0 auto;">
    
     @foreach ($hotel_score_order_list as $order)
     
     <div style="width:100%; margin:0 auto;clear:both;height:35px;">
        
           <div style="float:left;width: 20%;">&nbsp{{$order['goods_name'] }}</div>
           
           @if ( !empty($order['image'])) 
             <div style="float:left;width: 20%;"> <img src="{{$order['image'] }}" style="height:23px;"></div>
           @endif   
           @if ( empty($order['image'])) 
             <div style="float:left;width: 20%;">暂无图片</div>
           @endif     
           
           
          <div style="float:left;width: 20%;">&nbsp{{$order['exchange_points'] }}</div>
           @if ( $order['order_status'] === 0) <div style="float:left;width: 20%;">  待发货  </div>    @endif  
           @if ( $order['order_status'] === 1) <div style="float:left;width: 20%;">  已发货  </div>    @endif  
           <div style="float:left;width: 20%;">&nbsp {{str_limit($order['created_at'],10,'')}}</div>
           
     </div>
     
     @endforeach
    
</div>
</html>