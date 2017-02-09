<?php /* Smarty version 2.6.26, created on 2017-02-08 15:38:15
         compiled from default/public/member_order_details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/member.css" />
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/kf.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/member_sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
				<td><?php echo $this->_tpl_vars['orderDetais']['ordernum']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['order_state']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['order_pay']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['order_delivery']; ?>
</td>
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
			<?php $this->assign('total', 0); ?>
	<?php $_from = $this->_tpl_vars['orderDetais']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['value']['0']; ?>
</td>
				<td>
				<?php echo $this->_tpl_vars['value']['1']; ?>

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
			<caption>配送信息</caption>
			<tr>
				<th>配送状态</th>
				<th>物流方式</th>
				<th>运单号</th>
				<th>运费</th>
			</tr>
			<tr>
				<td><?php echo $this->_tpl_vars['orderDetais']['order_delivery']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['delivery']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['delivery_number']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['delivery_price']; ?>
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
				<td><?php echo $this->_tpl_vars['orderDetais']['order_pay']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['pay']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['pay_price']; ?>
/元</td>
			</tr>
		</table>
			<p id="total" style="text-align:center">
				商品总计：
				<strong class="sumprice" style="color: red"><?php echo $this->_tpl_vars['total']; ?>
</strong>
				/元 + 物流运费：
				<strong class="delivery" style="color: red"><?php echo $this->_tpl_vars['orderDetais']['delivery_price']; ?>
</strong>
				/元 + 支付手续费：
				<strong class="pay" style="color: red"><?php echo $this->_tpl_vars['orderDetais']['pay_price']; ?>
</strong>
				/元
			</p>

			<p style="text-align:center">
				您总共要支付的金额为：
				<strong class="price" style="color: red" ><?php echo $this->_tpl_vars['orderDetais']['price']; ?>
/元</strong>
				/元
			</p>
		<table id="cart" cellspacing="1">
			<caption>收货信息</caption>
			<tr>
				<th>收件人信息</th>
				<th>收件地址</th>
			</tr>
			<tr>
				<td><?php echo $this->_tpl_vars['orderDetais']['name']; ?>
（<?php echo $this->_tpl_vars['orderDetais']['tel']; ?>
）</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['address']; ?>
</td>
			</tr>
		</table>

		<table id="cart" cellspacing="1">
			<caption>备注信息</caption>
			<tr>
				<th>备注信息</th>
				<th>缺货方式</th>
			</tr>
			<tr>
				<td><?php echo $this->_tpl_vars['orderDetais']['text']; ?>
</td>
				<td><?php echo $this->_tpl_vars['orderDetais']['ps']; ?>
</td>
			</tr>
		</table>

		<p style="text-align:center">
			<a href="<?php echo $this->_tpl_vars['prev']; ?>
">[返回]</a>
		</p>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>