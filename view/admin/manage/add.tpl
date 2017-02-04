<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/manage.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/manage.js"></script>
</head>
<body>
	<h2>
		系统————新增管理员
		<a href="?a=manage">返回管理员列表</a>
	</h2>
	 <form method="post" action="?a=manage&m=add">
		<dl class="form">
				<input type="hidden" name="ajaxUser" val="" />
			<dd>
				用 户 名：
				<input type="text" name="user" class="text" placeholder="请输入用户名" />
			</dd>
			<dd>
				密&nbsp;&nbsp;码：
				<input type="password" name="pass" class="text" placeholder="请输入密码"/>
			</dd>
			<dd>
				确认密码：
				<input type="password" name="notpass" class="text" placeholder="请再次确认密码"/>
			</dd>
			<dd>
				等&nbsp;&nbsp;级：
				<select name="level">
					<option value="0">--请选择一个等级权限--</option>
					{foreach from=$allLevel item=value key=key}
					<option value="{$value.id}">{$value.level_name}</option>
					{/foreach}
				</select>
			</dd>
			<dd>
				<!-- <button name="send" value="" class="submit" /> -->
				<input onclick="return addManage()" type="submit" value="新增管理员" name="sub" >
			</dd>
		</dl>
	</form> 
</body>
</html>