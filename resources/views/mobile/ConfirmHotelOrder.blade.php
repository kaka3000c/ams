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
   
            <title>确认订单</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
<form action="/mobile/HotelOrder/insert" method="post" name="theForm" enctype="multipart/form-data" >
    {{ csrf_field() }}
<div style="width:97%; margin:0 auto;">
    
     <div style="width:30%;height:93px;float:left;"><img src="{{$image }}" style="width:93px;height:93px"></div>
     <div style="width:70%;height:93px;float:left;">   
        <div style="width:100%;height:30px;line-height:30px;">
            {{$goods_name }}
        </div>
        <div style="width:100%;height:30px;line-height:30px;">
            ￥{{$shop_price }}元
             <input type="hidden" id="pro_id" name="pro_id" value="{{ $pro_id }}">
             <input type="hidden" id="goods_name" name="goods_name" value="{{ $goods_name }}">
             <input type="hidden" id="shop_price" name="shop_price" value="{{ $shop_price }}"> 
             <input type="hidden" id="image" name="image" value="{{ $image }}"> 
        </div>
     </div>
</div>

<div style="width:97%; margin:0 auto;height:30px;">
    <div style="width:20%; height:30px;float:left;">购买数量</div>
    <div style="width:20%; height:30px;float:right;"><input id="buynum" name="buynum" value=""></div>
</div>
<div class="coupon_center" style="width:97%; margin:0 auto;height:50px;clear:both;">
     
   @foreach ($coupon_receives_list as $coupon) 
   @if ( $shop_price > $coupon['full_money'] )
   <div  class="coupon_box" style="width:30%;clear:both;"
        >
        
         <div class="coupon_box_left" style="width:80%">
               <div class="fuhao" style="width:20%">￥</div>
                <div class="coupon_money" style="width:20%">{{ $coupon['coupon_money'] }}</div>
                <div class="coupon_other" style="width:59%">
                     <div class="coupon_top">
                        {{ $coupon['coupon_name'] }}
                      </div>
                    <div class="coupon_bottom">
                        满{{ $coupon['full_money'] }}可用
                      </div>
                    
                </div>
         </div>
          <div class="coupon_box_right" style="width:19%">
              <input type="radio"  id="coupon" name="receive_id" value="{{ $coupon['receive_id'] }}" /> {{ $coupon['coupon_name'] }}
            </div>
         
   </div>
  
  @endif
   @endforeach
    
</div>

<div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
      <input type="submit" class="exchange" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;" value=" 立即支付 " />  
</div>
</form>
</html>