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
<script >

 $("#img-upload").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData($(".banner-upload"));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/mobile/productadmin/insert' ,
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
                             window.location.href="/mobile/productadmin/";
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

<div style="width:100%;height:50px;line-height:50px;text-align:center;  background-color:#f30000;color:#fff;" >商品添加</div>

<form class="form-horizontal" action="{{ URL('/mobile/productadmin/insert') }}" method="POST" enctype="multipart/form-data" class="banner-upload">
   
      {{ csrf_field() }}
       <table width="95%"  style="margin:0 auto;">
           <tr style="height:45px;">
              <td  class="label"> 产品名称</td>
              <td><input type="text" name="goods_name" value=""  style="width:200px;border:1px solid #d8d8d8; height:35px;line-height:35px;box-shadow:0px #ffffff;" /> </td>
           </tr>
           <tr style="height:45px;">
              <td  class="label"> 上传图片</td>
              <td> <input type="file" name="photo" value="" placeholder=""> </td>
           </tr>
           
       </table>     
      
      <!-- /.box-body -->
       <div style="position:fixed;left:3%; bottom: 15px; heigth:50px;width:95%;margin:0 auto; ">
        <button type="submit" class="btn btn-info pull-right" id="img-upload" style="width:95%;height:50px;line-height:50px; background-color:#e45650;margin:0 auto; 
           display: block; color: #fff; border-radius: 5px;background-attachment: scroll; text-align: center;-webkit-appearance: none;border:0px;">提交</button>
      </div>
  </form>

</html>