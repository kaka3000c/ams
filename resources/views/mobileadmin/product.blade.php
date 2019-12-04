<html>
    <head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">
   
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

<div style="width:100%;height:50px;line-height:50px;text-align:center;  background-color:#f30000;color:#fff;" >商品管理</div>
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
         <div  style="width:97%;margin:0 auto;height:65px;text-align:center;">
            <div><a href="/mobile/productadmin/add"><img src="http://www.0668zdm.com/storage/images/add_pro.png" style="width:50px;height:50px;"> </a></div>
            <div><a href="/mobile/productadmin/add">添加商品 </a></div>
         </div>
         
     </div>
     
    <div style="margin:0 auto;width:100%;">
       <ul>
        
           @foreach ($product_list as $product)
           <li style="border-bottom:solid 1px #e8e8e8;height:100px;width:100%;padding-top:10px;">
                <div style="width:90px;height:100px;float:left;margin-left:15px;"> <img style="width:90px;height:90px;" src="{{ $product['image'] }}" /></div>
                 <div style="height:100px;float:left;margin-left:15px;">
                     
                         <div> {{ $product['goods_name']  }}</div>
                         <div>                               </div>
                         
                 </div>    
                 <div style="width:50px;height:100px;float:right;margin-left:15px;text-align:center;">
                    <a href="http://www.baidu.com" style="margin-top:40px;width:50px;height:50px;display:block;" > > </a>
                 </div>
                 
                 
                
           </li>
           @endforeach
       </ul>
    </div>
   <div style="margin:0 auto;width:100%;">
    {{ $product_list->appends(request()->input())->links() }}
   </div>  
</div>

</html>