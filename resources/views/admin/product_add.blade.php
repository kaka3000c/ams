产品页面 

<form class="wst-lo-form" method="post" action="/admin/product/insert"  enctype="multipart/form-data">
                {{ csrf_field() }}
	<table>
	  <tr>
	    <td><div class="frame">
	    	<span class="loginname"></span>
	    	<input type='text'  name="name" class='ipt text' value='admin'>
	    </div></td>
          </tr>
         
        <tr>
	    <td><div class="frame">
	    	<span class="loginname"></span>
	    	 <input name="photo" type="file" />
	    </div></td>
          </tr>
	  <tr>
	    <td><div class="frame">
		    <span class="loginpwd"></span>
		    <input type='password' name="content"  class='ipt text'>
	    </div></td>
	  </tr>
	  <tr>
	    <td><div class="frame" style='padding-right:0px;'>
		    <span class="verifycode"></span>
		    <input type='text' id='verifyCode' class='ipt text2'><img id='verifyImg' src="/admin/index/getverify.html" onclick='javascript:getVerify(this)'>
	    </div></td>
	  </tr>
	  <tr>
	    <td colspan='2' align='center'>
	    <div class="but">
                <input name="login" type="submit" value='提交'/>
	      
	     
	    </div>
	    </td>
	  </tr>
	</table>
	</form>