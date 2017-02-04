<?php /* Smarty version 2.6.26, created on 2017-01-29 22:18:27
         compiled from admin/public/admin.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/admin.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/iframe.js"></script>
	<script type="text/javascript" src="view/admin/js/channel.js"></script>
</head>
<body>
	<div id="header">
		<p>您好, <?php echo $_SESSION['user']; ?>
 [<?php echo $_SESSION['level_name']; ?>
] <a target="break" href="?a=index">[去首页]</a> <a href="?a=admin&m=loginOut" onclick="return confirm('确定要退出吗?') ? true : false">[退出]</a></p>
		<ul>
			<li class="first">
				<a href="?a=admin&m=main" target="in">起始页</a>
			</li>
			<li>
				<a href="javascript:channel(0)">商品</a>
			</li>
			<li>
				<a href="javascript:channel(1)">订单</a>
			</li>
			<li>
				<a href="javascript:channel(2)">会员</a>
			</li>
			<li>
				<a href="javascript:channel(3)">系统</a>
			</li>
		</ul>
	</div>
	<div id="sidebar">
		<dl style="display: block">
			<dt>商品</dt>
			<dd><a href="?a=nav&m=index" target="in">导航条列表</a></dd>
			<dd><a href="?a=goods&m=index" target="in">商品列表</a></dd>
			<dd><a href="?a=bread&m=index" target="in">商品品牌</a></dd>
			<dd><a href="?a=attr&m=index" target="in">自定义属性</a></dd>
			<dd><a href="?a=price&m=index" target="in">价格区间设置</a></dd>
		</dl>
		<dl style="display: none">
			<dt>订单</dt>
			<dd><a href="?a=order" target="in">订单列表</a></dd>
			<dd>订单2</dd>
			<dd>订单3</dd>
		</dl>
		<dl style="display: none">
			<dt>会员</dt>
			<dd>会员1</dd>
			<dd>会员2</dd>
			<dd>会员3</dd>
		</dl>
		<dl style="display: none">
			<dt>系统</dt>
			<dd><a href="?a=manage&m=index" target="in">管理员列表</a></dd>
			<dd>系统2</dd>
			<dd>系统3</dd>
		</dl>
	</div>
	<div id='main'>
		<iframe src="?a=admin&m=main" name="in"></iframe>
	</div>
</body>
</html>