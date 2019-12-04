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
<script language='javascript' src='/js/jquery-3.2.1.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script>
    $(document).ready(function(){
           $(".vote_btn").click(function(){
               var vote_id= $("#vote_id").val();
               var option_id= $("#option_id").val();
               alert(option_id);
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/mobile/vote/vote_option_insert',
                    data: {vote_id:vote_id,option_id:option_id},
                    dataType: 'json',
                    async : 'false',    //同步
                    success: function(data){
                        
                        console.log(data);
                        
                         if(data.status==1){
                           console.log("提交成功");
                           window.location.reload();
                         }else if(data.status==0){
                            console.log("内部提交失败");
                         }
                       },
                       error:function(data){
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
<header class="head_banner header-top fixed" id="J_header_top">
   
    <div class="header-white">
        <div class="logo-img">
                    <div id="logo">
                        <a href="/"><img src="http://www.0668520.cn/storage/images/logo.jpg"></a>
                    </div>
                </div>
        <div class="logo-search">
            
            <input type="text" name="search" placeholder="搜索分类/品牌/商品" id="J_enter_search">
        </div>
        
        
    </div>
    <div class="header-tab">
         <div class="header-inner">
              <div class="channel-list">
                   <ul>
                        
                      <li><a href="/mobile/category/2">水果</a></li>
                      <li><a href="/mobile/category/11">美食</a></li>
                      <li><a href="/mobile/category/20">手机</a></li>
                      <li><a href="/mobile/category/8">运动</a></li>
                       <li><a href="/mobile/category/21">家具</a></li>
                       <li><a href="/mobile/vote">在线投票</a></li>
                  </ul> 
              </div>
         </div>
    </div>
    
</header>


<div class="vote_banner" style="height: 246px;margin-top: 88px;width:100%;">
    
    <img src="http://www.0668520.cn/storage/images/vote_banner.jpg" style="height: 246px;width:100%;">
    
</div>
<div class="index_all_ms" style="margin-top:15px;">
          
           <div class ="vote_detail_box">
                  <img src="{{$vote_option_detail['images'] }}" style="width:100%; height:208px;" />
                  <div class="vote_id">编号：{{$vote_option_detail['option_id'] }}  
                  <input type="hidden" id="vote_id" name="vote_id" value="{{$vote_option_detail['vote_id'] }}"  />
                  <input type="hidden" id="option_id" name="option_id" value="{{$vote_option_detail['option_id'] }}"  />
                  </div>
                   <div class="vote_name">     选手：{{$vote_option_detail['option_name'] }}</div>
                    <div class="vote_name">     票数：{{$vote_option_detail['option_count'] }}</div>
                     <div class="vote_name">     人气：{{$vote_option_detail['popularity'] }}</div>
                  <div class="vote_btn">投一票</div>
            </div>
           
           <div class="result"></div>
        
        
    
	
	 
  

   
 
  
</div>
<div style="width:100%;height:90px;"></div>
 @include('mobile/footer')
</html>