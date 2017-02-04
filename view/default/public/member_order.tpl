<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/member.css" />
</head>
<body>
	{include file='default/public/header.tpl'}

{include file='default/public/member_sidebar.tpl'}
	<div id="main">
		<h2>订单列表</h2>
		<table id="cart" cellspacing="1">
			<tr>
				<th>订单号</th>
				<th>下单时间</th>
				<th>总金额</th>
				<th>订单状态</th>
				<th>操作</th>
			</tr>
			{foreach from=$allOrder key=key item=value}
			<tr>
				<td>
					{$value.ordernum}
				</td>
				<td>{$value.date|date_format:'%Y-%m-%d %H:%M:%S'}</td>
				<td>{$value.price}/元</td>
				<td>
					{$value.order_state}，{$value.order_pay}，{$value.order_delivery}
					<p><a href="?a=member&m=order_details&id={$value.id}">订单详情</a></p>
				</td>
				<td>{if $value.order_pay=='未支付'}<a href="?a=member&m=yeepay&id={$value.id}">付款</a>{/if} 取消</td>
				{foreachelse}
				<td colspan="5">没有数据</td>
			</tr>
			{/foreach}
		</table>
		<div id="page">{$page}</div>
	</div>
{include file='default/public/footer.tpl'}
</body>
</html>