<html>
    <head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link href="/css/jy_mobile.css" rel="stylesheet" type="text/css" />
    <link href="/css/mobile.css" rel="stylesheet" type="text/css" />
     
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--PWA-->
    
    <link rel="stylesheet" type="text/css" href="/css/swiper_mobile.min.css">
<script language='javascript' src='/js/swiper.min.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<script>
lay('#version').html('-v'+ laydate.v);

//执行一个laydate实例
laydate.render({
  elem: '#birthday' //指定元素
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
   
            <title>茂名结婚网</title>
        <meta name="description" content="茂名结婚网">
        <meta name="keywords" content="茂名结婚网">
    
 
    
</head>


<div class="jy_user_data">
<form name="theForm" method="post" enctype="multipart/form-data" action="/jy_mobile/data/update">
    {{ csrf_field() }}
     <div class="jy_form">
          <div class="title">个人头像</div>
         
    <div class="jy_head"> 
        <img src="{{$user['headimgurl']}}" width="60">
    </div>
    
</div>
       <div class="jy_form_de">
           头像上传：<input name="touxiang" type="file" class="touxiang_input" />
       </div>
 </div>
       <div class="jy_form_monologue">
           <div class="title">内心独白</div>
         <div class="jy_form_de">
             <textarea name="monologue" id="monologue" cols="45" rows="5" class="monologue">{{$user['monologue']}}</textarea>
        
         </div>
      </div> 
       
      <div class="jy_form">
       <div class="title">基本信息</div>
       <div class="jy_form_de">
        性别：
          
               
          
        <input name="sex" type="radio" value="1"   @if ( $user['sex'] ==1))  checked  @endif />男  
               <input name="sex" type="radio" value="0"  @if ( $user['sex'] ==0))  checked  @endif/> 女
        </div>
        <div class="jy_form_de">
            出生日期：<input id="birthday" class="jy_form_input" type="text" name="birthday" value="{{$user['birthday']}}" placeholder="请输入出生日期" >
         </div>
       <div class="jy_form_de">
            身高：<select name="height">
                 @if ( !empty($user['height']))    <option value="{{$user['height']}}">{{$user['height']}}</option>      @endif  
               
                <option value="请选择身高">请选择身高</option>
  <option value="150">150</option>
  <option value="151">151</option>
  <option value="152"> 152</option>
   <option value="153"> 153</option>
    <option value="154">154</option>
     <option value="155">155</option>
      <option value="156">156</option>
       <option value="157">157</option>
        <option value="158">158</option>
         <option value="159">159</option>
         <option value="160">160</option>
  <option  value="161">161</option>
  <option  value="162">162</option>
   <option  value="163">163</option>
    <option  value="164">164</option>
     <option  value="165">165</option>
      <option  value="166">166</option>
       <option  value="167">167</option>
        <option  value="168">168</option>
         <option  value="169">169</option>
                      <option value="170">170</option>
  <option  value="171">171</option>
  <option  value="172">172</option>
   <option  value="173">173</option>
    <option  value="174">174</option>
     <option  value="175">175</option>
      <option  value="176">176</option>
       <option  value="177">177</option>
        <option  value="178">178</option>
         <option  value="179">179</option>   
          <option  value="180">180</option>
  <option value="181">181</option>
  <option value="182">182</option>
   <option value="183">183</option>
    <option value="184">184</option>
     <option value="185">185</option>
      <option value="186">186</option>
       <option value="187">187</option>
        <option value="188">188</option>
         <option value="189">189</option>  
         <option value="190">190</option>
  <option value="191">191</option>
  <option value="192">192</option>
   <option value="193">193</option>
    <option value="194">194</option>
     <option value="195">195</option>
      <option value="196"> 196</option>
       <option value="197">197</option>
        <option value="198">198</option>
         <option value="199">199</option> 
         <option value="200">200</option> 
</select>CM
         </div>
       <div class="jy_form_de">
            学历： <select name="education">
                @if ( !empty($user['education']))    <option value="{{$user['education']}}">{{$user['education']}}</option>      @endif  
                <option value="请选择">请选择</option>
                <option value="高中/中专">高中/中专</option>
                 <option value="专科">专科</option>
                 <option value="本科">本科</option>
                 <option value="硕士">硕士</option>
  <option value="博士">博士</option>
  <option value="博士后">博士后</option>
  <option value="初中">初中</option>
  <option value="小学">小学</option>
</select>
         </div>
       <div class="jy_form_de">
            婚姻状况：  <select name="marry">
      @if ( !empty($user['marry']))    <option value="{{$user['marry']}}">{{$user['marry']}}</option>      @endif   

                <option value="未婚">未婚</option>
                <option value="离异">离异</option>
  
</select>
         </div>
       <div class="jy_form_de">
            所在地区：  <select name="area">
  <option value="茂名">茂名</option>
  
</select>
         </div>
        <div class="jy_form_de">
            月薪： 
              @if ( !empty($user['salary']))   <input id="salary" class="jy_form_input" type="text" name="salary" value="{{$user['salary']}}" placeholder="请输入月薪" > 
                  @else if
               
            <input id="salary" class="jy_form_input" type="text" name="salary" value="" placeholder="请输入月薪" >@endif   

</select>
        <div class="jy_form_de">
 住房情况： <select name="housing_situation">
    @if ( !empty($user['housing_situation']))    <option value="{{$user['housing_situation']}}">{{$user['housing_situation']}}</option>      @endif   
  <option value="请选择">请选择</option>
                 
  <option value="暂无购房">暂无购房</option>  
  <option value="需要时购置">需要时购置</option>
  <option value="已购房-有贷款">已购房-有贷款</option>
  <option value="已购房-无贷款">已购房-无贷款</option
    <option value="与人合租">与人合租</option>
  <option value="独自租房">独自租房</option>
<option value="与父母同住">与父母同住</option>
<option value="住亲朋家">住亲朋家</option>
<option value="住单位房">住单位房</option>
</select>
         </div>
       <div class="jy_form_de">
            买车情况： <select name="car_situation">
                 @if ( !empty($user['car_situation']))    <option value="{{$user['car_situation']}}">{{$user['car_situation']}}</option>      @endif   
  <option value="请选择">请选择</option>
  <option value="暂无购车">暂无购车</option>
  <option value="已购车-经济型">已购车-经济型</option>
  <option value="已购车-中档型">已购车-中档型</option>
   <option value="已购车-豪华型">已购车-豪华型</option>
    <option value="单位用车">单位用车</option>
     <option value="需要时购置">需要时购置</option>
</select>
         </div>
        <div class="jy_form_de">
            <button type="submit"  class="btn_login">修改</button>
         </div>
 <div class="jy_form_de">  </div>
<div class="jy_form_de">  </div>
<div class="jy_form_de">  </div>
         </div>
      </div>
   </form>
</div>

 @include('jy_mobile/footer')
</html>