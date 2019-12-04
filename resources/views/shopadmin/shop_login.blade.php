<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>茂名值得买-商家管理后台</title>
<link href="/css/shop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="{{asset('/js/vue.js')}}"></script>
</head>
  
<body>

  <div class="container">
    <div class="header"><a href="/" class="header-logo"><img width="87" class="logo" src="http://www.0668520.cn/storage/images/logo.jpg" alt="茂名值得买网" /></a>
      <div class="header-title">商家管理后台</div>
    </div>
    <div class="content-wrap content-wrap-basic">
      <div class="content-inner content-inner-left pull-left">
        <div class="box">
          <div class="head">
            <ul>
              <li class="active js-tab-password-login">手机号码登录</li>
              <li class="js-tab-captcha-login"></li>
            </ul>
          </div>
          <div class="content">
            <div class="login">
              <form class="zent-form zent-form--horizontal" method="post" action="/shopadmin/sign" name='theForm'>
                   {{ csrf_field() }}
                   <div id="app">
                       
                <div class="phone-field zent-form__control-group">
                  <label class="zent-form__control-label">手机号码</label>
                  <div class="zent-form__controls">
                    <div class="zent-input-wrapper">
                        
                      
            <input type="text" class="num" value="" @blur.prevent="changemobile()"  v-model="mobile" name="mobile" id="mobile" placeholder="请输入手机号码" >
                           
                     </div>
                   </div>
                   <div class="title">
             @{{ msgmobile }}
             
         </div>
                </div>
                <div class="zent-form__control-group">
                  <label class="zent-form__control-label">登录密码</label>
                  <div class="zent-form__controls">
                    <div class="zent-input-wrapper">
                         <input type="password" class="num" value="" @blur.prevent="changepassword()"  v-model="password" name="password" id="password" placeholder="请输入密码" >
                    </div>
                  </div>
                    <div class="title">
             @{{ msgpassword }}
             
         </div>
                </div>
                <div class="zent-form__form-actions">
                  <div class="error-tip"></div>
                  <div class="zent-popover-wrapper zent-pop-wrapper" style="display: inline-block;">
                     
                    <button type="submit" class="zent-btn-primary zent-btn js-login-btn" style="width: 350px;"><span>登录</span></button>
                  </div>
                  <div class="zent-form__extra-group">
                    <label class="protocol zent-checkbox-wrap zent-checkbox-checked"><span class="zent-checkbox"><span class="zent-checkbox-inner"></span>
                      <input type="checkbox">
                      </span><span>已阅读并同意<a target="_blank" rel="noopener noreferrer" href="https://bbs.youzan.com/forum.php?mod=viewthread&amp;tid=672890&amp;page=1&amp;extra=#pid3837866">《用户使用协议》</a></span></label>
                    <div class="pull-right"><a class="retrieve-btn js-retrieve-btn" href="/retrieve-pass" rel="noopener noreferrer">忘记密码</a><a class="register-btn js-goto-register-btn" href="/register" rel="noopener noreferrer">免费注册</a></div>
                  </div>
                </div>
                        </div>
              </form>
                
            </div>
          </div>
        </div>
      </div>
      <div class="content-inner content-inner-right pull-left">
        <div class="banner-ct"><img src="//b.yzcdn.cn/v2/image/account/retailer-logos.png"></div>
      </div>
    </div>
    <div class="footer" id="footer">
      <p class="copyright">© 2012 - 2019 <a href="//www.youzan.com">Youzan.com</a></p>
    </div>
  </div>

</body>
</html>
<script>
  $("#mobile").val("");
document.getElementById("mobile").focus();
    var vm = new Vue({
        el:"#app",
        data:{
              msgmobile: '',
              msgpassword:''
        },
        methods:{
             changemobile:function(){
                 var mobile = $('#mobile').val();
                 if(mobile==""){
                    this.msgmobile = "手机号码不能为空！";
                 }
                 if(mobile.length!== 11){
                    this.msgmobile = "请输入11位手机号码！";
                 }
                 if(mobile.length== 11){
                    this.msgmobile = "";
                 }
                 var reg=/^1[3456789]\d{9}$/;
                 if(!reg.test(mobile)){
                     this.msgmobile="请输入有效的手机号码";
                 }     
                 
            },
            changepassword:function(){
                 var password = $('#password').val();
                 if(password==""){
                    this.msgpassword = "密码不能为空！";
                 }
                 if(password.length < 6){
                    this.msgpassword = "请输入6位以上密码！";
                 }
                 if(password.length >= 6){
                    this.msgpassword = "";
                 }
                 
                
                 
            }
        },
        mounted(){
          let inputelement=document.getElementById('mobile')
          inputelement.focus()
        }
    })

</script>