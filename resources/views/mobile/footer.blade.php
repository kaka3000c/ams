<script>
      $(function(){
        $(".open").click(function(){
           $(".main").show();
          $("#mask").show();
            });
        $(".close").click(function(){
           $(".main").hide();
           $("#mask").hide();
          });  
       });
       
</script>
 <!--蒙板-->
        <div id="mask" style="filter: Alpha(opacity=30); -moz-opacity: 0.3; -khtml-opacity: 0.3;
            opacity: 0.3; background-color: #000; width: 100%; height: 100%; z-index: 5px;
            position: fixed; left: 0; top: 0; display: none; overflow: hidden;z-index:90;">
        </div>
        <!--蒙板结束-->
<div class="main" style="border-radius: 16px;position: fixed;width:100%; height:280px; 
    bottom:0px;
    margin:auto;z-index:90; border:#e9e9e9 solid 1px;z-index:92;display: none; background-color: #fff;">
   <div style="border-radius: 16px;width:100%;height:35px;line-height: 35px;text-indent: 15px;font-size:18px;font-weight:bold;"> 快捷发布 </div>
    <ul style="width:100%;height:70px;">
         <li style="width:25%;height:35px;float:left;text-align: center;"><a href="/mobile/product/add">产品信息</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;"><a href="/mobile/promoinfo">优惠信息</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;"><a href="/mobile/employ/add">招聘信息</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;display:none;"><a href="/mobile/localservice">本地服务</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;display:none;"><a href="/mobile/house">房产</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;display:none;"><a href="/mobile/homefurnishing">家居</a></li>
         <li style="width:25%;height:35px;float:left;text-align: center;display:none;"><a href="/mobile/education">教育</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;display:none;"><a href="/mobile/car">二手汽车</a></li>
        <li style="width:25%;height:35px;float:left;text-align: center;"><a href="/mobile/jiaoyou/join">征婚</a></li>
       
    
    </ul>
     <div style="width:100%;height:35px;line-height: 35px;text-indent: 15px;display:block;font-size:18px;font-weight:bold;"> 入驻平台 </div>   
      <ul style="width:100%;clear:both;height:35px;">
     
        <li style="width:25%;height:35px;float:left;text-align: center;"><a href="/mobile/shopadmin/apply_shop">入驻商城</a></li>
    
    </ul>
         <div class="close" style=" z-index:99;width:38px;height:38px;
           line-height: 38px;text-align: center;
             position:absolute;
    left:48%;
    bottom:3px;border-radius: 50%;color: #878787;;display: block;" >关闭</div>
    
    
</div>
<footer  style=" width:100%;background: #fff; height:45px;position:fixed; bottom: 0px;z-index:3;"> 
    

    <div  style="position:fixed; bottom: 0px; width:100%; height:45px;">
                   
      
        
     
     
        
   
                  <ul style="height:45px;">
                        <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/mobile/index" style="width:100%;text-align:center;">首页</a></li>
                      <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/mobile/category" style="width:100%;text-align:center;">分类</a></li>
                      <li style="width:20%;height:45px;z-index:-1;line-height:45px;float:left;text-align:center;" class="open"  >
                          
                            <div class="open" style=" z-index:99;width:38px;height:38px;
           line-height: 38px;text-align: center;
            border-radius: 50%;color: #ffffff;background-color: #f50000;display: block;margin:0 auto;font-size:18px;font-weight:900;" >+</div>
            
                      </li>
                      <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/mobile/index" style="width:100%;text-align:center;">推荐</a></li>
                       <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/mobile/login" style="width:100%;text-align:center;">个人中心</a></li>
                  </ul> 
              </div>
    
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?5324ed3df8cb17ab644bd922a7adafa3";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</footer>
