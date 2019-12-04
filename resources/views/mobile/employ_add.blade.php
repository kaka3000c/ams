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
            url: '/mobile/employ/insert' ,
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
<script>
function s(e,a)
{
if ( e && e.preventDefault )
e.preventDefault();
else
window.event.returnValue=false;
a.focus();
}
</script>

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
<div style="width:100%;height:50px;line-height:50px;text-align:center;  background-color:#f30000;color:#fff;" >发布招聘信息</div>
<div style='width:100%;color:#dadada;'>公告: 本平台不对任何人提供任何形式的担保。请不要发布违法信息，将追究法律责任。</div>
<form class="form-horizontal" action="{{ URL('/mobile/employ/insert') }}" method="POST" enctype="multipart/form-data" class="banner-upload">
   
      {{ csrf_field() }}
       <table width="95%"  style="margin:0 auto;">
            <tr style="height:45px;">
              <td  class="label"> 请输入标题</td>
            
           </tr>
           <tr style="height:45px;">
              
              <td><input type="text" name="title" value="" 
                        
                         style="width:100%;border:1px solid #d8d8d8; height:35px;line-height:15px;box-shadow:0px #ffffff;font-size:15px;padding:0px;" /> </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 请输入详细内容</td>
            
           </tr>
            <tr style="height:45px;">
              
              <td> <textarea rows="3" cols="20" 
                               placeholder="请输入详细内容"
                             onmousedown="s(event,this)" name="content" style="width:100%;border:1px solid #d8d8d8; height:100px;line-height:15px;box-shadow:0px #ffffff;font-size:15px;
                              text-indent: 0px;"  >
 
                   </textarea>  
              </td>
           </tr>
           <tr style="height:45px;">
              <td  class="label"> 请输入联系人</td>
            
           </tr>
           <tr style="height:45px;">
             
              <td> 
              <input type="text" name="contacts" value=""  style="width:100%;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" /> 
              
              
              </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 请输入电话</td>
            
           </tr>
             <tr style="height:45px;">
             
              <td><input type="text" name="mobile" value=""  style="width:100%;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" /> </td>
           </tr>
            
       </table>     
      <div style='width:100%;height:85px;'></div>
      <!-- /.box-body -->
       <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
        <button type="submit" class="btn btn-info pull-right" id="img-upload" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;">发布</button>
      </div>
  </form>
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