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
            url: '/mobile/jiaoyou/update' ,
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
   
            <title>茂名值得买 | 茂名品质消费分享网站_网购决策门户</title>
        <meta name="description" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
        <meta name="keywords" content="茂名值得买 | 茂名品质消费分享网站_网购决策门户">
    
 
    
</head>
<div style="width:100%;height:50px;line-height:50px;text-align:center;  background-color:#f30000;color:#fff;" >资料填写</div>
<div style='width:100%;'>请如实填写真实资料，有助于增加信任。</div>
<form class="form-horizontal" action="{{ URL('/mobile/jiaoyou/update') }}" method="POST" enctype="multipart/form-data" class="banner-upload">
   
      {{ csrf_field() }}
       <table width="95%"  style="margin:0 auto;">
            <tr style="height:45px;">
              <td  class="label"> </td>
              <td> <img src="{{$marriage['touxiang']}}" style="width:100px;height:100px;"> </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> </td>
              <td> 如果想更新头像，请重新选取文件，否则留空</td>
           </tr>
             <tr style="height:45px;">
              <td  class="label"> 头像</td>
              <td> <input type="file" name="photo" value="" placeholder=""> </td>
           </tr>
           <tr style="height:45px;">
              <td  class="label"> 呢称</td>
              <td><input type="text" name="nickName" value="{{$marriage['nickName']}}"  style="width:200px;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" /> </td>
           </tr>
           <tr style="height:45px;">
              <td  class="label"> 性别</td>
              <td><select name='sex' >
  <option value ="1">男</option>
  <option value ="2">女</option>
 
</select> </td>
           </tr>
           <tr style="height:45px;">
              <td  class="label"> 出生日期</td>
              <td><input value="{{$marriage['birthday']}}" class="" readonly name="birthday" id="birthday" type="text" style="width:200px;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" > </td>
           </tr>
             <tr style="height:45px;">
              <td  class="label"> 身高</td>
              <td><input type="text" name="height" value="{{$marriage['height']}}"  style="width:200px;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" />厘米 </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 体重</td>
              <td><input type="text" name="weight" value="{{$marriage['weight']}}"  style="width:200px;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" /> 斤</td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 工作单位</td>
              <td> </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 学历</td>
              <td> <select name='education'>
                    <option value ="0">请选择</option>
                    <option value ="1">高中/中专</option>
                     <option value ="2">专科</option>
                      <option value ="3">本科</option>
                       <option value ="4">硕士</option>
                        <option value ="5">博士</option>
                         <option value ="6">博士后</option>
                          <option value ="7">初中</option>
                           <option value ="8">小学</option>
                           <option value ="9">不限</option>
 
                  </select> </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 婚姻状态</td>
              <td> 
              <select name='marry'>
                   <option value ="0">请选择</option>
                   <option value ="1">未婚</option>
                   <option value ="2">离异</option>
                    <option value ="3">丧偶</option>
                     <option value ="4">不限</option>
                  </select>
              
              
              </td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 收入状况</td>
              <td> <input type="text" name="salary" value="{{$marriage['salary']}}"  style="width:200px;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;font-size:16px;" /></td>
           </tr>
            <tr style="height:45px;">
              <td  class="label"> 购房情况</td>
              <td> <select name='housing_situation'>
                   <option value ="0">请选择</option>
                   <option value ="1">暂无购房</option>
                   <option value ="2">需要时购置</option>
                    <option value ="3">已购房-有贷款</option>
                     <option value ="4">已购房-无贷款</option>
                     <option value ="5">与人合租</option>
                   <option value ="6">独自租房</option>
                    <option value ="7">与父母同住</option>
                     <option value ="8">住亲朋家</option>
                        <option value ="9">住单位房</option>
                      <option value ="10">自建房</option>
                     
                  </select> </td>
           </tr> <tr style="height:45px;">
              <td  class="label"> 购车情况</td>
              <td> 
              <select name='car_situation'>
                   <option value ="0">请选择</option>
                   <option value ="1">暂无购车</option>
                   <option value ="2">已购车-经济型</option>
                    <option value ="3">已购车-中档型</option>
                     <option value ="4">已购车-豪华型</option>
                     <option value ="5">单位用车</option>
                   <option value ="6">需要时购置</option>
                 
                     
                  </select>
              
              
              
              </td>
           </tr>
       </table>     
      <div style='width:100%;height:85px;'></div>
      <!-- /.box-body -->
       <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
        <button type="submit" class="btn btn-info pull-right" id="img-upload" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;">修改</button>
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