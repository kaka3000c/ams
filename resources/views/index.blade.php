
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="ECSHOP v4.0.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="ECSHOP演示站" />
        <meta name="Description" content="ECSHOP演示站" />
        <title>茂名值得买网|茂名在线爆款|茂名在线房产|茂名在线招聘|茂名在线家居城|茂名在线优惠活动|茂名在线美食|茂名在线婚恋 </title>
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="icon" href="animated_favicon.gif" type="image/gif" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />

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
                    <h1 id="logo"></h1>
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
                                            <div class="indexpage_left">
                                                <div class="new_box_1">
                                                    <div class="news">
                                                        <div class="first_pic">
                                                            <a  href="/article/detail/{{ $lead_first['article_id'] }}">
                                                                <img src="http://www.0668zdm.com/{{$lead_first['image']}}" width="380" height="180">    
                                                            </a>
                                                        </div>
                                                        <div class="first_title">
                                                            <a  href="/article/detail/{{ $lead_first['article_id'] }}">
                                                                {{$lead_first['title']}}
                                                            </a>
                                                        </div>
                                                        <div class="sec_box">
                                                            <div class="sec_pic">
                                                                <a  href="/article/detail/{{ $lead_sec['article_id'] }}">
                                                                    <img src="http://www.0668zdm.com/{{$lead_sec['image']}}" width="183" height="116">
                                                                </a>                     
                                                            </div>
                                                            <div class="sec_title">
                                                                <a  href="/article/detail/{{ $lead_sec['article_id'] }}">
                                                                    {{$lead_sec['title']}}
                                                                </a>   
                                                            </div>
                                                        </div>
                                                        <div class="third_box">
                                                            <div class="third_pic">
                                                                <a  href="/article/detail/{{ $lead_third['article_id'] }}">
                                                                    <img src="http://www.0668zdm.com/{{$lead_third['image']}}" width="183" height="116">
                                                                </a> 
                                                            </div>
                                                            <div class="third_title">
                                                                <a  href="/article/detail/{{ $lead_third['article_id'] }}">
                                                                    {{$lead_third['title']}}
                                                                </a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="news" style="margin-left:32px;">
                                                        <h2><a>茂名头条</a></h2>
                                                        <ul class="news_list">
                                                            @foreach ($lead_news_list as  $article)
                                                            <li>
                                                                <a  href="/article/detail/{{ $article['article_id'] }}">
                                                                    {{str_limit($article['title'] ,42,'')}} 
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="ad3"><img src="http://www.0668zdm.com/storage/images/banner_2.jpg" width="868" height="110"></div>
                                                <div class="new_box_2">
                                                    <div class="news">
                                                        <h2><a>美食频道</a></h2>
                                                        <div class="first_pic">
                                                            <a  href="/article/detail/{{ $nice_food_first['article_id'] }}">
                                                                <img src="http://www.0668zdm.com/{{$nice_food_first['image']}}" width="380" height="180">    
                                                            </a>
                                                        </div>
                                                        <div class="first_title">
                                                            <a  href="/article/detail/{{ $nice_food_first['article_id'] }}">
                                                                {{$nice_food_first['title']}}
                                                            </a>
                                                        </div>
                                                        <div class="sec_box">
                                                            <div class="sec_pic">
                                                                <a  href="/article/detail/{{ $nice_food_sec['article_id'] }}">
                                                                    <img src="http://www.0668zdm.com/{{$nice_food_sec['image']}}" width="183" height="116">
                                                                </a>                     
                                                            </div>
                                                            <div class="sec_title">
                                                                <a  href="/article/detail/{{ $nice_food_sec['article_id'] }}">
                                                                    {{$nice_food_sec['title']}}
                                                                </a>   
                                                            </div>
                                                        </div>
                                                        <div class="third_box">
                                                            <div class="third_pic">
                                                                <a  href="/article/detail/{{ $nice_food_third['article_id'] }}">
                                                                    <img src="http://www.0668zdm.com/{{$nice_food_third['image']}}" width="183" height="116">
                                                                </a> 
                                                            </div>
                                                            <div class="third_title">
                                                                <a  href="/article/detail/{{ $nice_food_third['article_id'] }}">
                                                                    {{$nice_food_third['title']}}
                                                                </a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="news" style="margin-left:32px;">
                                                        <h2><a>优惠活动</a></h2>
                                                        <ul class="news_list">
                                                            @foreach ($discount_list as  $article)
                                                            <li>
                                                                <a  href="/article/detail/{{ $article['article_id'] }}">
                                                                    {{str_limit($article['title'] ,42,'')}} 
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="ad4"><img src="http://www.0668zdm.com/storage/images/banner_2.jpg" width="868" height="110"></div>
                                                <div class="new_box_3">
                                                    <div class="news" >
                                                        <h2><a>二手房频道</a></h2>
                                                        <ul class="news_list">
                                                            @foreach ($second_house_list as  $house)
                                                            <li style="height:90px;">
                                                                <div style="width:90px;float:left;"><img src="http://www.0668zdm.com/{{$house['image']}}" width="90" height="90">  </div>
                                                                <div style="width:326px;float:left;">

                                                                    <a  href="/product/detail/{{ $house['pro_id'] }}">
                                                                        {{str_limit($house['goods_name'] ,42,'')}} </a>
                                                                </div>


                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="news" style="margin-left:32px;">
                                                        <h2><a>租房频道</a></h2>
                                                        <ul class="news_list">
                                                            @foreach ($rent_house_list as  $house)
                                                            <li style="height:90px;">
                                                                <div style="width:90px;float:left;"> <img src="http://www.0668zdm.com/{{$house['image']}}" width="90" height="90">   </div>
                                                                <div style="width:326px;float:left;">

                                                                    <a  href="/product/detail/{{ $house['pro_id'] }}">
                                                                        {{str_limit($house['goods_name'] ,42,'')}} </a>
                                                                </div>

                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="ad5"><img src="http://www.0668zdm.com/storage/images/banner_2.jpg" width="868" height="110"></div>
                                                <div class="new_box_3">


                                                </div>
                                                <div class="ad6"><img src="http://www.0668zdm.com/storage/images/banner_2.jpg" width="868" height="110"></div>
                                            </div>
                                            <div class="indexpage_right">
                                                <div class="ad_right_1">
                                                   
                                                        <div class="sjjz" style="">
                                                            <a href="/mobile/shopadmin/apply_shop">     点击商家进驻
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="cpxx">
                                                            <a href="/mobile/product/add">    发布产品信息</a>
                                                        </div>           

                                                        
                                                        <div class="yhxx" style="">
                                                            <a href="/mobile/promoinfo">   发布优惠信息</a>
                                                        </div>
                                                        <div class="zpxx" style="">
                                                            <a href="/mobile/employ/add">  发布招聘信息</a>
                                                        </div>




                                                    </div>


                                               
                                                <div class="ad_right_2">
                                                    <img src="http://www.0668zdm.com/storage/images/banner/20190701123654.jpeg" width="330" >
                                                </div>
                                                <div class="ad_right_3">
                                                    <img src="http://www.0668zdm.com/storage/images/banner/20190701174017.jpeg" width="330">
                                                </div>
                                                <div class="ad_right_4">
                                                    <img src="http://www.0668zdm.com/storage/images/banner/20190722145256.jpeg" width="330" >
                                                </div>
                                                <div class="ad_right_5">
                                                    <img src="http://www.0668zdm.com/storage/images/banner/20190722145312.jpeg" width="330" >
                                                </div>
                                                <div class="ad_right_6">
                                                    <img src="http://www.0668zdm.com/storage/images/banner/20190722145332.jpeg" width="330" >
                                                </div>
                                                <div class="ad_right_7">
                                                    <img src="http://www.0668zdm.com/storage/images/banner/20190722152321.jpeg" width="330" >
                                                </div>
                                                <div class="ad_right_8">
                                                    <h2><a href="/employ/">招聘信息</a></h2>
                                                    <ul class="news_list">
                                                        @foreach ($employ_list as $employ)
                                                        <li>
                                                            <a href="/employ/detail/{{$employ['id'] }}">
                                                                {{$employ['title'] }}

                                                            </a>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="indexpage">
                                            <div class="pro_box">
                                                <h2>茂名爆款</2>
                                                    <ul >
                                                        @foreach ($product_list as $product)
                                                        <li style="border-bottom:#f1f2f6 solid 1px; height:200px; width:96%;margin:0 auto;float:left;"> 
                                                            <div class="pro_pic" style="width:180px;height:180px;float:left;
                                                                 }"><a href="/product/detail/{{$product['pro_id']}}">
                                                                    <img src="{{$product['image']}}"  class="goodsimg" width="180" height="180" style="margin-top:5px;">
                                                                </a>
                                                            </div>
                                                            <div class="pro_title" style="width:950px;line-height:23px;height:98px;float:left;">
                                                                <a href="/product/detail/{{$product['pro_id']}}" style="color:#191919;margin-top:8px;display:block;width:96%;"margin:0 auto;>  {{$product['goods_name']}}</a>
                                                                </br> 
                                                                实体店名称： @if ( !empty($product['shop_name'])) {{$product['shop_name']}} @endif

                                                                </br>
                                                                实体店地址：  @if ( !empty($product['address'])) {{$product['address']}} @endif

                                                            </div>


                                                        </li>
                                                        @endforeach </ul>
                                            </div>
                                        </div>
                                        <div class="indexpage clearfix">
                                            <div class="indexpage_left">
                                                <div id="category">
                                                    <ul class="category-ul" _hover-ignore="1">

                                                        <li class="category-item">
                                                            <h3><a href="" target="_blank" onclick="dataLayer.push({'event': '12110', 'name': '热门标签'})" _hover-ignore="1">热门标签</a></h3>
                                                            <span _hover-ignore="1">
                                                                <a href="/" class="item-li " target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '汽车'})" _hover-ignore="1">家具</a>
                                                                <a href="" class="item-li " target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '旅游'})">家居用品</a>
                                                                <a href="/" class="item-li highlight" target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '领券'})" _hover-ignore="1">床上用品</a>
                                                                <a href="/" class="item-li " target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '白菜'})">灯饰</a>
                                                                <a href="" class="item-li highlight" target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '优衣库'})">建筑装修材料</a>
                                                                <a href="" class="item-li " target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '酒水'})">化妆品</a>
                                                                <a href="" class="item-li " target="_blank" onclick="dataLayer.push({'event': '12120', 'name': '热门标签', 'tag': '绝对值'})">花卉盆载</a>
                                                            </span>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="index-banner"> 
                                                    <style>
                                                        .swiper-container {
                                                            width: 100%;
                                                            height: 100%;
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
                                                    <div class="swiper-container swiper1">
                                                        <div class="swiper-wrapper">
                                                            @foreach ($banner_list as $banner)
                                                            <div class="swiper-slide"><img src="{{$banner->image }}" alt="智能相机" class="goodsimg" height="278" width="600"></div>
                                                            @endforeach
                                                        </div>

                                                        <div class="swiper-pagination"></div>
                                                    </div>
                                                    <script>
                                                        var swiper = new Swiper('.swiper1', {
                                                            pagination: '.swiper-pagination',
                                                            nextButton: '.swiper-button-next',
                                                            prevButton: '.swiper-button-prev',
                                                            paginationClickable: true,
                                                            spaceBetween: 0,
                                                            centeredSlides: true,
                                                            autoplay: 4000,
                                                            loop: true,
                                                            autoplayDisableOnInteraction: false
                                                        });
                                                    </script> </div>
                                            </div>
                                            <div class="indexpage_right">
                                                <div class="banner-stuff">
                                                    <img src="/storage/images/5b5144ef3c7e47585.jpg"  class="goodsimg" width="300" height="192">

                                                </div>


                                            </div>


                                        </div>



                                        </div>


                                        @include('footer')

                                        </body>
                                        </html>








