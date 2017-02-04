<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城1系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/cart.css" />
	<script type="text/javascript" src="view/default/js/jquery.js"></script>
	<script type="text/javascript" src="view/default/js/cart.js"></script>
</head>
<body>
	<form action="?a=cart&m=flow" method="POST">
		{include file='default/public/header.tpl'}
		<table id="cart" cellspacing="1">
			<tr>
				<th>
					<input type="checkbox" name="allChecked"/>
					全选
				</th>
				<th>名称</th>
				<th>属性</th>
				<th class="th">售价</th>
				<th class="th">数量</th>
				<th class="th">小计</th>
				<th class="th">操作</th>
			</tr>
			{assign var=total value=0}
		{foreach from=$FrontCart key=key item=value1}
		{foreach from=$value1 key=key item=value}
			<tr>
				<td id="test">
					<input class="checkbox" type="checkbox" name="cartid[]" val="{$value.price_sale*$value.nums}" value='{$value.id}'/>
				</td>
				<td>
					<span>{$value.name}</span>
					<img style="width: 10px;" src="{$value.thumbnail2}"/>
				</td>
				<td>
					<span>
						{foreach from=$value.attr key=key1 item=value1}
							{$key1}:{$value1}
						{/foreach}
					</span>
				</td>
				<td class="price" >
					<span val='{$value.price_sale}'>{$value.price_sale}/元</span>
				</td>
				<td> <b onclick="minus(this)" class="minus">-</b>
					<span>
						<input  disabled="disabled" type="text" name="nums" val="{$value.id}" class="small" value="{$value.nums}" />
					</span> <b onclick="plus(this)" class="plus" val='{$value.inventory}'>+</b>
				</td>
				<td class="price">
					<span class="subtotal" val='{$value.price_sale*$value.nums}'>{$value.price_sale*$value.nums}/元</span>
				</td>
				<td>
					<a href="?a=cart&m=delete&id={$value.id}" onclick="return confirm('确定要删除吗') ? true : false">删除</a>
				</td>
			</tr>
			{/foreach}
		{/foreach}
		</table>
		<div id="page">{$page}</div>
		<p>
			<a href="./">继续购物</a>
			|
			<a href="?a=cart&m=delete" onclick="return confirm('确定要清空所有购物车数据吗') ? true : false">清空购物车</a>
			| 共计： <strong class="price sumprice">{$total}</strong>
			/元
		</p>

		<p>
			<!-- <input type="submit" style="background: url(view/default/images/checkout.gif) no-repeat;width:144px;height:35px">
			-->
			<button  type="submit"  style="background: url(view/default/images/checkout.gif) no-repeat;width:144px;height:35px"></button>
		</p>
	</form>
	{include file='default/public/footer.tpl'}
</body>
</html>
