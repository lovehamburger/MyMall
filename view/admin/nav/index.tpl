<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/nav.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
</head>
<body>
	<h2>
		商品————商品导航页
		<a href="?a=nav&m=add{if $smarty.get.id}&id={$smarty.get.id}{/if}">添加导航</a>
	</h2>
	<div id="list">
		<form method="POST" action="?a=nav&m=sort">
			<table>
				<tr>
					<th>序号</th>
					<th>名称</th>
					<th>简介</th>
					{if $oneNav}<th>品牌</th>{else}<th>子类</th>{/if}
					<th>排序</th>
					<th>操作</th>
				</tr>
				{foreach from=$allNav key=key item=value}
				<tr>
					<td id="read">{$key+1}</td>
					<td>{$value.name}</td>
					<td>{$value.info}</td>
					<td>
						{if $oneNav}
						{$value.bread}
						{else}
						<a href="?a=nav&m=index&id={$value.id}">查看</a>|<a href="?a=nav&m=add&id={$value.id}">添加</a>
						{/if}
					</td>
					<td><input type="text" class="sort" name="{$value.id}" value="{$value.sort}"></td>
					<td>
						<a href="?a=nav&m=update&id={$value.id}"><img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" /></a>
						<a href="?a=nav&m=delete&id={$value.id}" onclick="return confirm('确定要删除数据吗?') ? true : false"><img src="view/admin/images/drop.gif" alt="删除" title="删除" /></a>
					</td>
					{foreachelse}
					<td colspan="6">没有任何数据</td>
				</tr>
				{/foreach}
				{if $allNav}<tr><td><td><td><td><td><input type="submit" value="排序"><td></td></td></td></td></td></td></tr>{/if}
				{if $oneNav}<tr><td colspan="6">主类名称：[{$oneNav.0.name}] <a href="?a=nav">[返回]</a></td></tr>{/if}
			</table>
		</form>
	</div>
	<div id="page">{$page}</div>
</body>
</html>