



<form id="form1" name="form1" method="post" action="/ams/public/register">
    
     {{ csrf_field() }}
    <table>
        <tr>
            <td>姓名：</td>
            <td><input name="name" type="text"></td>
            </tr>
            <td>邮箱：</td>
            <td><input name="email" type="email"></td>
            </tr>
            
            <td>密码：</td>
            <td><input name="password" type="password"></td>
            </tr>
            
            <td>重复密码：</td>
            <td><input name="password_confirmation" type="password"></td>
            </tr>
            
            
             <tr>
         <td></td>
         <td><button   type="submit"> 注册</button></td>
            </tr>
        
    </table>
    
    
    
</form>
