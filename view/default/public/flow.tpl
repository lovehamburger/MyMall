<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/flow.css" />
	<script type="text/javascript" src="view/default/js/jquery.js"></script>
	<script type="text/javascript" src="view/default/js/flow.js"></script>
</head>
<body>
	{include file='default/public/header.tpl'}
	<form method="post" name="flow" action="?a=cart&m=order">
		<table id="cart" cellspacing="1">
			<caption>商品列表</caption>
			<tr>
				<!-- <th>编号</th> -->
				<th>名称</th>
				<th>属性</th>
				<th class="th">售价</th>
				<th class="th">数量</th>
				<th class="th">小计</th>
			</tr>
			{assign var=total value=0}
			{foreach from=$FrontCart key=key item=value}
			{assign var=total value=$total+$value.nums*$value.price_sale}
				<tr class="cart">
					<td>{$value.name}</td>
					<td>
						{foreach from=$value.attr key=key1 item=value1}
							{$key1}:{$value1}
						{/foreach}
					</td>
					<td>{$value.price_sale}</td>
					<td>{$value.nums}</td>
					<td style="color: green">{$value.nums*$value.price_sale}/元</td>
				</tr>	
			{/foreach}
		</table>

		<p>
			<a href="?a=cart">返回修改</a>
			| 商品总计： <strong class="price sumprice">{$total}</strong>
			/元
		</p>
		</form>
			<p  style="font-size: 14px;font-weight: bold;margin: 5px 0;color: #026ACB;text-align:center">收货人信息</p>
			{foreach from=$selectedRess key=key item=value}
			<input type="radio" class="ress" name=[] value="{$key}" {if $value.selected==1}checked="checked"{/if} >
			 {$value.address} ({$value.name}) {$value.tel}
			 <table style="display: none">
				<tr>
					<td width="25%">收货人信息：</td>
					<td width="25%" name='name'>{$value.name}</td>
					<td width="25%">电子邮件：</td>
					<td width="25%" name='email'>{$value.email}</td>
				</tr>
				<tr>
					<td>收货人地址：</td>
					<td name='address'>{$value.address}</td>
					<td>邮政编码：</td>
					<td name='code'>{$value.code}</td>
				</tr>
				<tr>
					<td>手机信息：</td>
					<td name='tel'>{$value.tel}</td>
					<td>标志性建筑：</td>
					<td name='buildings'>{$value.buildings}</td>
				</tr>
			</table>
				
			<!--<div style="display:inline-block;display: none;">
				<span>{$value.email}</span>
				<span>{$value.code}</span>
				<span>{$selectedRess.buildings}</span>
			</div> -->
			<a onclick="openwindow('?a=member&m=updateress&id={$value.id}','',900,600)">修改收货地址</a>
			<br/>			
			{/foreach}
			

		<table id="cart" cellspacing="1">
			<caption>物流配送信息</caption>
			<tr>
				<th width="10%"></th>
				<th width="20%">名称</th>
				<th width="50%">描述</th>
				<th>运费</th>
			</tr>
			<tr>
				<td>
					<input title="申通快递" type="radio" name="delivery_radio" value="10" onclick="changeDelivery(this);" checked="checked" />
				</td>
				<td>申通快递</td>
				<td>江浙沪6元起步，省外11元起步，1公斤内，额外的1公斤加10元。</td>
				<td>10元</td>
			</tr>
			<tr>
				<td>
					<input title="邮政EMS" type="radio" name="delivery_radio" value="20" onclick="changeDelivery(this);"  />
				</td>
				<td>邮政EMS</td>
				<td>江浙沪12元起步，省外20元起步，1公斤内，额外的1公斤加10元。</td>
				<td>20元</td>
			</tr>
			<tr>
				<td>
					<input title="邮政平邮" type="radio" name="delivery_radio" value="6" onclick="changeDelivery(this);"  />
				</td>
				<td>邮政平邮</td>
				<td>无</td>
				<td>6元</td>
			</tr>
		</table>

		<p>
			您要支付的运费为： <strong id="delivery"></strong>
			/元
		</p>

		<table id="cart" cellspacing="1">
			<caption>支付方式</caption>
			<tr>
				<th width="10%"></th>
				<th width="20%">名称</th>
				<th width="50%">描述</th>
				<th>手续费</th>
			</tr>
			<tr>
				<td>
					<input title="支付宝" type="radio" name="pay_radio" value="0" onclick="changePay(this);" checked="checked" />
				</td>
				<td>支付宝</td>
				<td>通过支付宝在线支付</td>
				<td>0/元</td>
			</tr>
			<tr>
				<td>
					<input title="银行转账/汇款" type="radio" name="pay_radio" value="2" onclick="changePay(this);" />
				</td>
				<td>银行转账/汇款</td>
				<td>通过转账汇款，联系客服，提供汇款清单和商品订单号</td>
				<td>2/元</td>
			</tr>
			<tr>
				<td>
					<input  title="货到付款" type="radio" name="pay_radio" value="0" onclick="changePay(this);" />
				</td>
				<td>货到付款</td>
				<td>通过配送人员，送货上门，收取费用</td>
				<td>0/元</td>
			</tr>
		</table>

		<p>
			您要支付的手续费为：
			<strong id="pay"></strong>
			/元
		</p>

		<table id="cart" cellspacing="1">
			<caption>备注信息</caption>
			<tr>
				<th width="30%"'>订单备注：</th>
				<td class="left">
					<textarea name="text"></textarea>
				</td>
			</tr>
			<tr>
				<th>缺货处理：</th>
				<td class="left">
					<input type="radio" value="0" name="ps" checked="checked" />
					先发有货的
					<input type="radio" value="1" name="ps" />
					等货物全了再发
					<input type="radio" value="2" name="ps" />
					取消订单
				</td>
			</tr>
			</table>

			<p id="total">
				商品总计：
				<strong class="sumprice">3</strong>
				/元 + 物流运费：
				<strong class="delivery">4</strong>
				/元 + 支付手续费：
				<strong class="pay">5</strong>
				/元
			</p>

			<p>
				您总共要支付的金额为：
				<strong class="price" id="price" >0</strong>
				/元
			</p>

			<p style="text-align:center;">
				<div style="border: none;text-align:center;" name="sendOrder"><img src="view/default/images/order.gif" alt="提交订单" /></div>
			</p>
		</form>
{include file='default/public/footer.tpl'}
</body>
	</html>