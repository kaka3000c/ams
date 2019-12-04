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
    
    <div class="app">
         <div class="app__content">
             <form class="form-horizontal">
                 
                 <div class="control-group">
                     <label class="control-label">店铺名称：</label>
                     <div class="controls">
                         <span class="sink">{{ $shop['shop_name'] }}</span>
                         
                     </div>
                 </div>
                 <div class="control-group">
                     <label class="control-label">店铺Logo：</label>
                     <div class="controls">
                         <span class="sink"><img src="{{ $shop['shop_logo'] }}" width="16"></span>
                         
                     </div>
                 </div>
                 <div class="control-group">
                     <label class="control-label">店铺联系人：</label>
                     <div class="controls">
                         <span class="sink">{{ $shop['contact'] }}</span>
                         
                     </div>
                 </div>
                 <div class="control-group">
                     <label class="control-label">联系手机号码：</label>
                     <div class="controls">
                         <span class="sink">{{ $shop['mobile'] }}</span>
                         
                     </div>
                 </div>
                  <div class="control-group">
                     <label class="control-label">联系地址：</label>
                     <div class="controls">
                         <span class="sink">{{ $shop['address'] }}</span>
                         
                     </div>
                 </div>
                  <div class="control-group">
                     <label class="control-label">创建时间：</label>
                     <div class="controls">
                         <span class="sink">{{ $shop['created_at'] }}</span>
                         
                     </div>
                 </div>
             </form>
          </form>
          </div>
    </div>
    
</body>
</html>