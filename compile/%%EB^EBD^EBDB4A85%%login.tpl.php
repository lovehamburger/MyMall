<?php /* Smarty version 2.6.26, created on 2017-01-29 09:41:01
         compiled from admin/public/login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城后台登录</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/admin/style/login.css" />
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/login.js"></script>
</head>
<body>

<div id="login">
	<form method="post" name="login" action="?a=admin&m=login">
			<input type="hidden" name="ajaxlogin" id="ajaxlogin" val=""/> 
			<input type="hidden" name="ajaxcode"   val=""  />
		
		<dl>
			<dd>
				用&nbsp;户&nbsp;名：
				<input type="text" name="user" id="user"  class="text" />
			</dd>
			<dd>
				密&nbsp;&nbsp;&nbsp;码：
				<input type="password" name="pass" id="pass" class="text" />
			</dd>
			<dd>
				验&nbsp;证&nbsp;码：
				<input type="text" style="text-transform:uppercase;" name="code" id="code"  class="text" />
			</dd>
			<dd class="code">
				<img src="?a=Call&m=validateCode" title="看不清？点击刷新" onclick="javascript:this.src='?a=Call&m=validateCode&tm='+Math.random()" />
			</dd>
			<dd>
				<input type="submit" class="submit"  onclick="return adminLogin();" value="进入管理中心" />
			</dd>
		</dl>
	</form>
</div>

</body>
</html>