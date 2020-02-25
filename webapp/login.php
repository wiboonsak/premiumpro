
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="style1.css" rel="stylesheet" type="text/css"> -->
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="loginForm">
<p class="boxLogin"><span class="header1">กรุณาเข้าสู่ระบบ</span><br>
		  <span class="memberTxt">username : </span>
          <input name="xuser" type="text" class="textinputNormal" id="xuser" autocomplete="off">
	      <br>
		  <span class="memberTxt">password : </span>
		  &nbsp;<input name="xpass" type="password" class="textinputNormal" id="xpass" autocomplete="off"><br><br>
			<input name="Submit" type="submit" class="buttonMenu" value="เข้าสู่ระบบ" style="margin-left:80px;" >
            <input type="hidden" name="action" value="login">
  </p>
</form>