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
{include file='default/public/kf.tpl'}
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
					{if $value.order_state=='已取消'}
							订单已取消
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
							{else}
							{if $value.order_state=='未确认'}
							订单未确认，等待确认
												{/if}
											{/if}
										{/if}
									{/if}
								{/if}
							{/if}
						{/if}
					<p><a href="?a=member&m=order_details&id={$value.id}">订单详情</a></p>
				</td>
				<td>
				{if $value.order_pay=='未支付' && $value.order_state!=='已取消'}<a href="?a=member&m=yeepay&id={$value.id}">付款</a>{/if}
				{if $value.order_state=='已取消'}已取消{/if}
				{if $value.order_delivery=='已完成'}已完成{/if}
				{if $value.order_delivery=='已发货'}<a href="?a=member&m=harvest&id={$value.id}" onclick="return confirm('请确认是否已收到物品，以免造成钱货两清哦！') ? true : false">确认收货</a> <a href="?a=member&m=&id={$value.id}" onclick="return confirm('请确认是否已收到物品，以免造成钱货两清哦！') ? true : false">退款/退货</a> {/if}
				{if $value.order_state!=='已取消' && $value.order_delivery!=='已完成' && $value.order_delivery!=='已发货'}<a href="?a=member&m=remove&id={$value.id}">取消{/if}</a></td>
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