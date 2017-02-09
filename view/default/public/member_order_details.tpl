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
		<h2>订单详情</h2>
		<table id="cart" cellspacing="1">
			<caption>订单状态</caption>
			<tr>
				<th>订单号</th>
				<th>订单状态</th>
				<th>支付状态</th>
				<th>配送状态</th>
			</tr>
			<tr>
				<td>{$orderDetais.ordernum}</td>
				<td>{$orderDetais.order_state}</td>
				<td>{$orderDetais.order_pay}</td>
				<td>{$orderDetais.order_delivery}</td>
			</tr>
		</table>

		<table id="cart" cellspacing="1">
			<caption>商品列表</caption>
			<tr>
				<th>名称</th>
				<th>属性</th>
				<th class="th">售价</th>
				<th class="th">数量</th>
				<th class="th">小计</th>
			</tr>
			{assign var=total value=0}
	{foreach from=$orderDetais.goods key=key item=value}
			<tr>
				<td>{$value.0}</td>
				<td>
				{$value.1}
				</td>
				<td class="price">{$value.2}</td>
				<td>{$value.3}</td>
				<td class="price">{$value.2*$value.3}/元</td>
			</tr>
			{assign var=total value=$total+$value.2*$value.3}
			{/foreach}
		</table>

		<table id="cart" cellspacing="1">
			<caption>配送信息</caption>
			<tr>
				<th>配送状态</th>
				<th>物流方式</th>
				<th>运单号</th>
				<th>运费</th>
			</tr>
			<tr>
				<td>{$orderDetais.order_delivery}</td>
				<td>{$orderDetais.delivery}</td>
				<td>{$orderDetais.delivery_number}</td>
				<td>{$orderDetais.delivery_price}/元</td>
			</tr>
		</table>

		<table id="cart" cellspacing="1">
			<caption>支付信息</caption>
			<tr>
				<th>支付状态</th>
				<th>支付方式</th>
				<th>手续费</th>
			</tr>
			<tr>
				<td>{$orderDetais.order_pay}</td>
				<td>{$orderDetais.pay}</td>
				<td>{$orderDetais.pay_price}/元</td>
			</tr>
		</table>
			<p id="total" style="text-align:center">
				商品总计：
				<strong class="sumprice" style="color: red">{$total}</strong>
				/元 + 物流运费：
				<strong class="delivery" style="color: red">{$orderDetais.delivery_price}</strong>
				/元 + 支付手续费：
				<strong class="pay" style="color: red">{$orderDetais.pay_price}</strong>
				/元
			</p>

			<p style="text-align:center">
				您总共要支付的金额为：
				<strong class="price" style="color: red" >{$orderDetais.price}/元</strong>
				/元
			</p>
		<table id="cart" cellspacing="1">
			<caption>收货信息</caption>
			<tr>
				<th>收件人信息</th>
				<th>收件地址</th>
			</tr>
			<tr>
				<td>{$orderDetais.name}（{$orderDetais.tel}）</td>
				<td>{$orderDetais.address}</td>
			</tr>
		</table>

		<table id="cart" cellspacing="1">
			<caption>备注信息</caption>
			<tr>
				<th>备注信息</th>
				<th>缺货方式</th>
			</tr>
			<tr>
				<td>{$orderDetais.text}</td>
				<td>{$orderDetais.ps}</td>
			</tr>
		</table>

		<p style="text-align:center">
			<a href="{$prev}">[返回]</a>
		</p>
	</div>
{include file='default/public/footer.tpl'}
</body>
</html>