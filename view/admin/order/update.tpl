<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城后台管理</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/admin/style/order.css" />
</head>
<body>

	<h2>
		<a href="?a=order">返回订单列表</a>
		订单 -- 修改订单
	</h2>

	<div id="list">
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
	{foreach from=$oneOrder.goods key=key item=value}
			<tr>
				<td>{$value.0}</td>
				<td>{$value.1}</td>
				<td class="price">{$value.2}</td>
				<td>{$value.3}</td>
				<td class="price">{$value.2*$value.3}/元</td>
			</tr>
			{assign var=total value=$total+$value.2*$value.3}
			{/foreach}
		</table>

		<table id="cart" cellspacing="1">
			<caption>备注信息</caption>
			<tr>
				<th>备注信息</th>
				<th>缺货方式</th>
			</tr>
			<tr>
				<td>{$oneOrder.text}</td>
				<td>{$oneOrder.ps}</td>
			</tr>
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
				<td>{$oneOrder.order_delivery}</td>
				<td>{$oneOrder.delivery}</td>
				<td>{$oneOrder.delivery_number}</td>
				<td>{$oneOrder.delivery_price}/元</td>
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
				<td>{$oneOrder.order_pay}</td>
				<td>{$oneOrder.pay}</td>
				<td>{$oneOrder.pay_price}/元</td>
			</tr>
		</table>
			<p id="total" style="text-align:center">
				商品总计：
				<strong class="sumprice" style="color: red">{$total}</strong>
				/元 + 物流运费：
				<strong class="delivery" style="color: red">{$oneOrder.delivery_price}</strong>
				/元 + 支付手续费：
				<strong class="pay" style="color: red">{$oneOrder.pay_price}</strong>
				/元
			</p>

			<p style="text-align:center">
				您总共要支付的金额为：
				<strong class="price" style="color: red" >{$oneOrder.price}/元</strong>
				/元
			</p>

	</div>
{if $oneOrder.order_delivery!=='已完成'}
	<form method="post" name="update" action="?a=order&m=update&id={$oneOrder.id}">
		<dl class="form">
			<dd>
				订单状态：
				<input type="radio" name="order_state" {if $oneOrder.order_state == '未确认'}checked="checked"{/if} value="0" />
				未确认
				<input type="radio" name="order_state" {if $oneOrder.order_state == '已确认'}checked="checked"{/if} value="1" />
				已确认
				<input type="radio" name="order_state" {if $oneOrder.order_state == '已取消'}checked="checked"{/if} value="2" />
				已取消
			</dd>
			<!-- <dd>
				支付状态：
				<input type="radio" name="order_pay" {if $oneOrder.order_pay == '未付款'}checked="checked"{/if} value="未付款" />
				未付款
				<input type="radio" name="order_pay" {if $oneOrder.order_pay == '已付款'}checked="checked"{/if} value="已付款" />
				已付款
			</dd> -->
			<dd>
				
				配送状态：
				<input type="radio" name="order_delivery" {if $oneOrder.order_delivery == '未发货'}checked="checked"{/if} value="0" />
				未发货
				<input type="radio" name="order_delivery" {if $oneOrder.order_delivery == '已配货'}checked="checked"{/if} value="1" />
				已配货
				<input type="radio" name="order_delivery" {if $oneOrder.order_delivery == '已发货'}checked="checked"{/if} value="2" />
				已发货
				{if $oneOrder.order_pay=='已支付'}用户已支付,支付方式：{$oneOrder.pay}{/if}
			</dd>
			<dd>
				<input type="submit" name="send" class="submit" value="修改订单" />
			</dd>
		</dl>
	</form>
{else}
用户已完成该订单
{/if}
</body>
</html>