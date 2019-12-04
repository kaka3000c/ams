
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="ECSHOP v4.0.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="茂名家居网 | 茂名在线家居网" />
        <meta name="Description" content="茂名家居网 | 茂名在线家居网" />
        <title>茂名家居网 | 茂名家居在线网</title>
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="icon" href="animated_favicon.gif" type="image/gif" />
        <link href="/css/jiaju_style.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="/css/swiper.min.css">
            <script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
            <script type="text/javascript" src="/js/common.js"></script>
            <script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            var process_request = "正在处理您的请求...";
        </script>
        <header id="header">
            <div id="global-search">
                <div class="search-inner z-clearfix">
                    <h1 id="jiaju_logo"></h1>
                    <form action="" method="get" id="search-form">
                        <div class="search-wrap">
                            <div class="search-input-wrap" id="J_search_sug">
                                <input type="hidden" name="c" value="home" readonly="readonly">
                                    <input type="search" class="search-input" id="J_search_input" name="s" value="" placeholder="牙膏" autocomplete="off">
                                        </div>
                                        <button type="submit" class="search-submit z-icons z-icon-search" onclick="dataLayer.push({'event': '11100', 'button': '搜索框'})"></button>
                                        </div>

                                        <div class="hot-words">
                                            热门搜索:                            <a target="_blank" rel="nofollow" class="" href="https://search.smzdm.com/?c=home&amp;s=%E5%BC%80%E5%AD%A6%E5%AD%A3" onclick="dataLayer.push({'event': '11200', 'button': '开学季'})">
                                                开学季                            </a>
                                            <a target="_blank" rel="nofollow" class="highlight" href="https://search.smzdm.com/?c=home&amp;s=智能锁&amp;source=hot" onclick="dataLayer.push({'event': '11200', 'button': '智能锁'})">
                                                智能锁                            </a>
                                            <a target="_blank" rel="nofollow" class="" href="https://search.smzdm.com/?c=youhui&amp;s=运动鞋&amp;source=hot" onclick="dataLayer.push({'event': '11200', 'button': '运动鞋'})">
                                                运动鞋                            </a>
                                            <a target="_blank" rel="nofollow" class="" href="https://search.smzdm.com/?c=youhui&amp;s=火车票&amp;source=hot" onclick="dataLayer.push({'event': '11200', 'button': '火车票优惠'})">
                                                火车票优惠                            </a>
                                        </div>
                                        </form>
                                        </div>
                                        <div class="header_right">

                                            <a href="https://weibo.com/7181041576/" target="_blank">官方微博</a>
                                            <div class="zdm_qr_code">
                                                <img src="http://www.0668zdm.com/storage/images/0668zdm_qr_code.jpg" alt="" class="zdm_qr_code" height="88" width="88">
                                                    <div class="zdm_qr_code_text">扫一扫关注公众号</div>
                                            </div>
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
                                                <ul class="control-list">
                                                    <li class="current" ><a href="#" >关于我们</a></li>
                                                    <li class="current" ><a href="#" >商业合作</a></li>
                                                    <li ><a href="#" >爆料投稿</a></li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="notice">

                                            <div class="wrap">公告：发现茂名本地实体店优惠商品及促销活动、攻略
                                            </div>
                                        </div>
                                        <div class="indexpage">
                                            <div class="ad1"><img src="http://www.0668zdm.com/storage/images/banner.gif" width="1200" height="110"></div>

                                        </div>
 <div class="indexpage">
     <ul class="company_logo">
          @foreach ($shop_list as $shop)
         <li>
             <div class="company_pic"><img src="{{$shop['shop_logo']}}"  class="goodsimg" width="120" height="80" style="margin-top:5px;"></div>
              <div class="company_text"> {{$shop['shop_name']}}</div>
         </li>
          @endforeach 
     </ul>
 </div>
 <div class="indexpage">
     <div class="daily_product_title">
         每日新品
     </div>
      <ul class="daily_product">
           @foreach ($product_list as $product)
          <li>
              <div class="daily_product_pic">
                  <a href="/jiaju_product/detail/{{$product['pro_id']}}">
                                                                    <img src="{{$product['image']}}"  class="goodsimg" width="290" height="290" style="margin-top:5px;">
                                                                </a>
              </div>
              <div class="daily_product_text">
                  <a href="/jiaju_product/detail/{{$product['pro_id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>  {{$product['goods_name']}}</a>
                                                                
              </div>
                  <div class="daily_product_price"></div>
              
          </li>
          @endforeach
     </ul>
     
 </div>

                                        </div>


                                        @include('footer')

                                        </body>
                                        </html>








