
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4.0.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
  <title>茂名家居网 | 茂名家居在线网</title>
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
             <image  src="/storage/images/jiaju_logo.jpg" width="233" height="93"></image>
             
         </div>
         
         
     </div>
 </header>
<div class="top-bar">
  <div class="fd_top fd_top1">
       <ul class="nav-list">
           @include('jiaju_menu')
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
     @foreach ($product_detail as $product)
    <div id="goodsInfo" class="clearfix">
      
      <div class="imgInfo">
                <img src="../../{{ $product->image }}" alt="{{ $product->name }}" width="250px" height="250px"/>
                
          </div>
      
      <div class="textInfo">
        <form action="javascript:addToCart(72)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
          <div class="goods_style_name"> {{ $product->goods_name }} </div>
          <ul>
                      
             
                    @foreach ($shop_detail as $shop)  
                       <li class="clearfix" style="height:25px;line-height:25px;">
              <dd  >
                                <strong>商家名称：</strong> {{ $shop->shop_name }}                            </dd>   
            </li> 
                    <li class="clearfix" style="height:25px;line-height:25px;">
             <dd  >
                                <strong>商家地址：</strong> {{ $shop->address }}                            </dd>   
            </li> 
                    <li class="clearfix" style="height:25px;line-height:25px;">
             <dd  >
                                <strong>商家电话：</strong> {{ $shop->mobile }}                            </dd>
            </li> 
                    <li class="clearfix" style="height:25px;line-height:25px;">
             <dd  >
                                <strong>商家微信：</strong> {{ $shop->weixing }}                            </dd>
              
            </li>    
                     @endforeach   
           
            
          </ul>
        </form>
          <form class="wst-lo-form" method="post" action="/order/insert">
                {{ csrf_field() }}
                 <input type='hidden' id='pro_id' name="pro_id" class='ipt text' value='{{ $product->pro_id }}'>
                 <ul class="order">   
                     <li style="margin-top: 20px;">
                  <input type='text' id='userName' name="userName" class='standard' value='' placeholder="请输入联系人姓名">
                 </li>
                   <li style="margin-top: 7px;">   
                  <input type='text' id='moblie' name="mobile" class='standard' value='' placeholder="请输入联系人电话">   </li> 
                  <li style="margin-top: 7px;"> <textarea name="remarks" cols="" rows="" placeholder="请输入备注信息" class="standard_textarea"></textarea> </li>
                 
                  <li style="margin-top: 7px;"><input name="login" type="submit" value='提交购买意向' class="intention"/></li>
                 </ul>
	    </form>
      </div>
    </div>
      <div id="com_v">
          <div class="tip">  茂名值得买是一家中立的消费门户网站，好价信息来自热心值友爆料和商家自荐，经小编人工审核或小值机器人智能判断后发布。促销折扣可能随时变化，请网友们购买前注意核实。  </div>
             
           <div class="pro_content"> 
                 {!! $content !!}
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







       
	