<form id="form1" name="form1" method="POST" action="/ams/public/user/me/store">
    
   {{ csrf_field() }}
    <table><tr>
            <td></td>
            <td>登录</td>
            </tr>
            
             <tr>
        <tr>
            <td>姓名：</td>
            <td><input name="name" type="text"></td>
            </tr>
            
             <tr>
         <td>姓名：</td>
         <td><button   type="submit"> 注册</button></td>
            </tr>
        
    </table>
    
    
    
</form>