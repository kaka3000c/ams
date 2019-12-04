
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4.0.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title> 茂名值得买</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
     <header id="header">
     <div id="global-search">
         <div class="search-inner z-clearfix">
             <image  src="/storage/images/logo.jpg" width="233" height="93"></image>
             
         </div>
         
         
     </div>
 </header>
<div class="top-bar">
  <div class="fd_top fd_top1">
       <ul class="nav-list">
           @include('menu')
      </ul>
    <div class="bar-left">
          <div class="top_menu1"> 
            @if (isset($name))
         Hello {{ $name }}   <a href="/user/index" class="">用户中心</a>   <a href="/logout">退出</a>
         @else
         <a href="/login">登录</a> |  <a href="/register">免费注册</a> 
        @endif
           </div>
    </div>
    
  </div>
</div>


<div class="clear0 "></div>
<div class="goods-home">
  

<div class="blank"></div>
<div class="block clearfix">
  
  <div class="AreaL">
     @foreach ($article_detail as $article)
    <div id="goodsInfo" class="clearfix">
      {{ $article->title }} 
     
    </div>
      <div id="com_v">
          <div class="tip">    </div>
             
           <div class="article_content"> 
                 {!! $article->content !!}
                 </div>
          </div>
      @endforeach
     
  
   
    
    
   
     
    </div>
    
    <div class="AreaR">
        <div class="rightPanel">
            <p class="intro"><b>精选优惠：</b>海量网友爆料+编辑精选的茂名超值好价商品，每款推荐都精挑细选。</p>
            <a href="" target="_blank" rel="nofollow" class="a_wantTo" ><span>+</span>我要爆料</a>
        </div>
        
        
    </div>
    </div>
     
    </div>
    
  
</div>  </div>
  
</div>

</div>

 
 
</body>

</html>







       
	