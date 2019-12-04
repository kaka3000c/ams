<footer class="footer" style="background: #fff;heigth:105px;"> 
    @if ($is_sale == 1)
   <div class="yixiang" style=" position:fixed; bottom: 45px; heigth:45px;">
       <a href="/jiaju_mobile/order/{{$id}}">立即抢购</a>
    </div>

@endif
    
  <div  style="position:fixed; bottom: 0px; width:100%; height:45px;background: #fff;">
                   
      
        
     
     
        
   
                  <ul style="height:45px;">
                        <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/jiaju_mobile/index" style="width:100%;text-align:center;">首页</a></li>
                      <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/jiaju_mobile/category" style="width:100%;text-align:center;">分类</a></li>
                      <li style="width:20%;height:45px;z-index:-1;line-height:45px;float:left;text-align:center;" class="open"  >
                          
                            <div class="open" style=" z-index:99;width:38px;height:38px;
           line-height: 38px;text-align: center;
            border-radius: 50%;color: #ffffff;background-color: #f50000;display: block;margin:0 auto;font-size:18px;font-weight:900;" >+</div>
            
                      </li>
                      <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/jiaju_mobile/index" style="width:100%;text-align:center;">推荐</a></li>
                       <li style="width:20%;height:45px;line-height:45px;float:left;text-align:center;" ><a href="/jiaju_mobile/login" style="width:100%;text-align:center;">个人中心</a></li>
                  </ul> 
              </div>
<!-- 百度统计代码 -->   
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
