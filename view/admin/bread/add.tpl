<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/manage.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/bread.js"></script>
</head>
<body>
	<h2>
		商品————新增品牌
		<a href="?a=bread">返回品牌列表</a>
	</h2>
	 <form method="post" action="?a=bread&m=add">
	 <input type="hidden" name="ajaxName" val="">
		<dl class="form">
			<dd>
				品牌名称：
				<input type="text" name="name" placeholder="请输入品牌名称" /><span class="red">[必填]</span>
			</dd>
			<dd>
				官网链接：
				<input type="text" name="url" placeholder="请输入官网链接" />
			</dd>
			<dd>
				品牌简介：
				<textarea name="info" placeholder="请输入品牌简介"></textarea>
			</dd>
			<dd>
				<button onclick="return addBread()" class="submit" type="submit"  name="sub" >新增品牌</button>
			</dd>
		</dl>
	</form> 
</body>
</html>