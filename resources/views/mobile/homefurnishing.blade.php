<html>
    <head>
    
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">

    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link href="/css/mobile.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--PWA-->
    
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>

 <script>
       var swiper = new Swiper('.swiper1', {
           pagination: '.swiper-pagination',
           nextButton: '.swiper-button-next',
           prevButton: '.swiper-button-prev',
           paginationClickable: true,
           spaceBetween: 0,
           centeredSlides: true,
           autoplay: 4000,
           loop:true,
           autoplayDisableOnInteraction: false
       });
</script>
<script src="/js/jquery-3.2.1.min.js"></script>
 <script src="/js/mobiscroll_002.js" type="text/javascript"></script>
	<script src="/js/mobiscroll_004.js" type="text/javascript"></script>
	<link href="/css/mobiscroll_002.css" rel="stylesheet" type="text/css">
	<link href="/css/mobiscroll.css" rel="stylesheet" type="text/css">
	<script src="/js/mobiscroll.js" type="text/javascript"></script>
	<script src="/js/mobiscroll_003.js" type="text/javascript"></script>
	<script src="/js/mobiscroll_005.js" type="text/javascript"></script>
	<link href="/css/mobiscroll_003.css" rel="stylesheet" type="text/css">

<script >

 $("#img-upload").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData($(".banner-upload"));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/mobile/homefurnishing/insert' ,
            data: formData ,
            processData:false,
            //mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            success:function(data){
                layer.open({
                        title: '温馨提示',
                        area: ["80px", "60px"],
                        content: data.msg,
                        btn: ["确认"],
                        yes: function (index, layero) {
                             window.location.href="/mobile/jiaoyou/join";
                              }
                        }); 
                if(data.status){
                    console.log(data.message);
                }
            },
            error:function(err){
                console.log(err);
            }
        }); 
</script>
<script type="text/javascript" src="js/index.js"></script>

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
   
            <title>家居频道 -- 茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
 @include('mobile/header')
  <div style=" width:90%;margin:0 auto; height:55px;line-height:55px;  margin-top: 45px;font-size:18px;font-weight:900;">
      <ul>
      <li  style="float:left;width:33%;text-align: center;"><a href="/mobile/fc">家装主材</a></li>
      <li style="float:left;width:33%;text-align: center;"><a href="/mobile/second">五金电工</a></li> 
      <li style="float:left;width:33%;text-align: center;"><a href="/mobile/rent">住宅家具</a></li>
      <li  style="float:left;width:33%;text-align: center;"><a href="/mobile/fc">灯具灯饰</a></li>
      <li style="float:left;width:33%;text-align: center;"><a href="/mobile/second">家纺布艺</a></li> 
      <li style="float:left;width:33%;text-align: center;"><a href="/mobile/rent">家居饰品</a></li>
      </ul>
  </div>


<script type="text/javascript">
        $(function () {
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
		        startYear: currYear - 60, //开始年份
		        endYear: currYear - 10 //结束年份
			};

		  	$("#birthday").mobiscroll($.extend(opt['date'], opt['default']));
		  	var optDateTime = $.extend(opt['datetime'], opt['default']);
		  	var optTime = $.extend(opt['time'], opt['default']);
		    $("#appDateTime").mobiscroll(optDateTime).datetime(optDateTime);
		    $("#appTime").mobiscroll(optTime).time(optTime);
        });
    </script>
</html>