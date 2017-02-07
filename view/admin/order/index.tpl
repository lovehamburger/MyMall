<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城后台管理</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/admin/style/order.css" />
</head>
<body>

	<h2>订单 -- 订单列表</h2>

	<div id="list">
		<table>
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
					<a href="?a=order&m=update&id={$value.id}">{$value.ordernum}</a></td>
					<td>{$value.date|date_format:'%Y-%m-%d %H:%M:%S'}</td>
					<td>{$value.price}/元</td>
					<td>
						{if $value.order_state=='已取消'}
							订单已取消
						{else}
							{if $value.order_state=='未确认'}
							订单未确认，等待确认
							{else}
									{if $value.order_delivery=='已完成'}
									该订单已完成
									{else}
									{if $value.order_delivery=='已发货'}
									等待收货
									{else}
									{if $value.order_delivery=='已配货'}
									准备发货
									{else}
									{if $value.order_pay=='已支付'}
									订单已付款，等待配货
									{else}
									{if $value.order_state=='已确认'}
									订单已确认，等待付款
												{/if}
											{/if}
										{/if}
									{/if}
								{/if}
							{/if}
						{/if}
					</td>
					<td>
						<a href="?a=order&m=update&id={$value.id}">
							<img src="view/admin/images/edit.gif" alt="编辑" title="编辑" />
						</a>
						<a href="?a=order&m=delete&id={$value.id}" onclick="return confirm('你真的要删除这条订单吗？') ? true : false">
							<img src="view/admin/images/drop.gif" alt="删除" title="删除" />
						</a>
					</td>
				</tr>
				{foreachelse}
				<tr>
					<td colspan="5">没有订单</td>
				</tr>
				{/foreach}
			</table>
		</div>
		<div id="page">{$page}</div>

</body>
	</html>