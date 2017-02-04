<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/goods.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/goods.js"></script>
</head>
<body>
	<h2>
		商品————商品列表页
		<a href="?a=goods&m=add">添加商品</a>
	</h2>
	<div id="list">
		<table>
			<tr>
				<th>商品名称</th>
				<th>商品编号</th>
				<th>商品售价</th>
				<th>商品类型</th>
				<th>品牌</th>
				<th>是否上架</th>
				<th>库存</th>
				<th>操作</th>
			</tr>
			{foreach from=$allGoods key=key item=value}
			<tr>
				<td id="read">{$value.gname|truncate:18}</td>
				<td>{$value.sn}</td>
				<td>{$value.price_sale}/元</td>
				<td>{$value.nname}</td>
				<td>{$value.bread}</td>
				{if $value.is_up != 1}
				<td>
					<span class="red">
						否
						<a onclick="is_up(this,{$value.id})">[上架]</a>
					</span>
				</td>
				{else}
				<td>
					<span class="green">
						是
						<a onclick="is_down(this,{$value.id})">[下架]</a>
					</span>
				</td>
				{/if}
				<td>{$value.inventory}</td>
				<td>
					<a href="?a=goods&m=update&id={$value.id}">
						<img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" />
					</a>
					<a href="?a=goods&m=delete&id={$value.id}" onclick="return confirm('确定要删除数据吗?') ? true : false">
						<img src="view/admin/images/drop.gif" alt="删除" title="删除" />
					</a>
				</td>
				{foreachelse}
				<td colspan="8">没有任何数据</td>
			</tr>
			{/foreach}
		</table>
	</div>
	<div id="page">{$page}</div>
</body>
</html>