<?php /* Smarty version 2.6.26, created on 2017-02-09 10:52:40
         compiled from admin/order/update.tpl */ ?>
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
			<?php $this->assign('total', 0); ?>
		<?php $_from = $this->_tpl_vars['oneOrder']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['value']['0']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['1']; ?>
</td>
				<td class="price"><?php echo $this->_tpl_vars['value']['2']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['3']; ?>
</td>
				<td class="price"><?php echo $this->_tpl_vars['value']['2']*$this->_tpl_vars['value']['3']; ?>
/元</td>
			</tr>
			<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['value']['2']*$this->_tpl_vars['value']['3']); ?>
		<?php endforeach; endif; unset($_from); ?>
		</table>

		<table id="cart" cellspacing="1">
			<caption>备注信息</caption>
			<tr>
				<th>备注信息</th>
				<th>缺货方式</th>
			</tr>
			<tr>
				<td><?php echo $this->_tpl_vars['oneOrder']['text']; ?>
</td>
				<td><?php echo $this->_tpl_vars['oneOrder']['ps']; ?>
</td>
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
				<td><?php echo $this->_tpl_vars['oneOrder']['order_delivery']; ?>
</td>
				<td><?php echo $this->_tpl_vars['oneOrder']['delivery']; ?>
</td>
				<td><?php echo $this->_tpl_vars['oneOrder']['delivery_number']; ?>
</td>
				<td><?php echo $this->_tpl_vars['oneOrder']['delivery_price']; ?>
/元</td>
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
				<td><?php echo $this->_tpl_vars['oneOrder']['order_pay']; ?>
</td>
				<td><?php echo $this->_tpl_vars['oneOrder']['pay']; ?>
</td>
				<td><?php echo $this->_tpl_vars['oneOrder']['pay_price']; ?>
/元</td>
			</tr>
		</table>
			<p id="total" style="text-align:center">
				商品总计：
				<strong class="sumprice" style="color: red"><?php echo $this->_tpl_vars['total']; ?>
</strong>
				/元 + 物流运费：
				<strong class="delivery" style="color: red"><?php echo $this->_tpl_vars['oneOrder']['delivery_price']; ?>
</strong>
				/元 + 支付手续费：
				<strong class="pay" style="color: red"><?php echo $this->_tpl_vars['oneOrder']['pay_price']; ?>
</strong>
				/元
			</p>

			<p style="text-align:center">
				您总共要支付的金额为：
				<strong class="price" style="color: red" ><?php echo $this->_tpl_vars['oneOrder']['price']; ?>
/元</strong>
				/元
			</p>

	</div>
<?php if ($this->_tpl_vars['oneOrder']['order_delivery'] !== '已完成'): ?>
	<form method="post" name="update" action="?a=order&m=update&id=<?php echo $this->_tpl_vars['oneOrder']['id']; ?>
">
		<dl class="form">
		<?php if ($this->_tpl_vars['oneOrder']['order_pay'] !== '已支付'): ?>
			<dd>
				订单状态：
				<input type="radio" name="order_state" <?php if ($this->_tpl_vars['oneOrder']['order_state'] == '未确认'): ?>checked="checked"<?php endif; ?> value="0" />
				未确认
				<input type="radio" name="order_state" <?php if ($this->_tpl_vars['oneOrder']['order_state'] == '已确认'): ?>checked="checked"<?php endif; ?> value="1" />
				已确认
				<input type="radio" name="order_state" <?php if ($this->_tpl_vars['oneOrder']['order_state'] == '已取消'): ?>checked="checked"<?php endif; ?> value="2" />
				已取消
			<?php $_from = $this->_tpl_vars['oneOrder']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
				<input type="text" name="good[<?php echo $this->_tpl_vars['key']; ?>
][]" value="<?php echo $this->_tpl_vars['value']['3']; ?>
" />
				<input type="text" name="good[<?php echo $this->_tpl_vars['key']; ?>
][]" value="<?php echo $this->_tpl_vars['value']['6']; ?>
" />
			<?php endforeach; endif; unset($_from); ?>
			</dd>
			<!-- <dd>
				支付状态：
				<input type="radio" name="order_pay" <?php if ($this->_tpl_vars['oneOrder']['order_pay'] == '未付款'): ?>checked="checked"<?php endif; ?> value="未付款" />
				未付款
				<input type="radio" name="order_pay" <?php if ($this->_tpl_vars['oneOrder']['order_pay'] == '已付款'): ?>checked="checked"<?php endif; ?> value="已付款" />
				已付款
			</dd> -->
			
			<dd>
				配送状态：
				<input type="radio" name="order_delivery" <?php if ($this->_tpl_vars['oneOrder']['order_delivery'] == '未发货'): ?>checked="checked"<?php endif; ?> value="0" />
				未发货
				<input type="radio" name="order_delivery" <?php if ($this->_tpl_vars['oneOrder']['order_delivery'] == '已配货'): ?>checked="checked"<?php endif; ?> value="1" />
				已配货
				<input type="radio" name="order_delivery" <?php if ($this->_tpl_vars['oneOrder']['order_delivery'] == '已发货'): ?>checked="checked"<?php endif; ?> value="2" />
				已发货
			</dd>
			<input type="submit" name="send" class="submit" value="修改订单" />
			<?php else: ?>
				<span style="color: green">用户已支付,支付方式：<?php echo $this->_tpl_vars['oneOrder']['pay']; ?>
</span>
			<?php endif; ?>
			<dd>
			</dd>
		</dl>
	</form>
<?php else: ?>
用户已完成该订单
<?php endif; ?>
</body>
</html>