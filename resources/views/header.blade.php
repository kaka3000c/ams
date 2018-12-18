@if (isset($name))
Hello {{ $name }}   <a href="/user/index" class="">用户中心</a>   <a href="/logout">退出</a>
@else
<a href="/login">登录</a> |  <a href="/register">免费注册</a> 
@endif