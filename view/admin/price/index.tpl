<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
</head>
<body>
	<h2>
		商品————价格区间列表页
		<a href="?a=price&m=add">添加价格区间</a>
	</h2>
	<div id="list">
		<table>
			<tr>
				<th>序号</th>
				<th>价格区间</th>
				<th>操作</th>
			</tr>
			{foreach from=$allPrice key=key item=value}
			<tr>
				<td>{$key+1}</td>
				<td>{$value.price} 元 </td>
				<td>
					<a href="?a=price&m=update&id={$value.id}"><img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" /></a>
					<a href="?a=price&m=delete&id={$value.id}" onclick="return confirm('确定要删除数据吗?') ? true : false"><img src="view/admin/images/drop.gif" alt="删除" title="删除" /></a>
				</td>
				{foreachelse}
				<td colspan="3">没有任何数据</td>
			</tr>
			{/foreach}
		</table>
	</div>
	<div id="page">{$page}</div>
</body>
</html>