<?php /* Smarty version 2.6.26, created on 2017-02-08 15:38:07
         compiled from default/public/member_order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'default/public/member_order.tpl', 28, false),)), $this); ?>
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
		<h2>订单列表</h2>
		<table id="cart" cellspacing="1">
			<tr>
				<th>订单号</th>
				<th>下单时间</th>
				<th>总金额</th>
				<th>订单状态</th>
				<th>操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['allOrder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td>
					<?php echo $this->_tpl_vars['value']['ordernum']; ?>

				</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['price']; ?>
/元</td>
				<td>
					<?php if ($this->_tpl_vars['value']['order_state'] == '已取消'): ?>
							订单已取消
						<?php else: ?>
							<?php if ($this->_tpl_vars['value']['order_delivery'] == '已完成'): ?>
							该订单已完成
							<?php else: ?>
							<?php if ($this->_tpl_vars['value']['order_delivery'] == '已发货'): ?>
							等待收货
							<?php else: ?>
							<?php if ($this->_tpl_vars['value']['order_delivery'] == '已配货'): ?>
							准备发货
							<?php else: ?>
							<?php if ($this->_tpl_vars['value']['order_pay'] == '已支付'): ?>
							订单已付款，等待配货
							<?php else: ?>
							<?php if ($this->_tpl_vars['value']['order_state'] == '已确认'): ?>
							订单已确认，等待付款
							<?php else: ?>
							<?php if ($this->_tpl_vars['value']['order_state'] == '未确认'): ?>
							订单未确认，等待确认
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					<p><a href="?a=member&m=order_details&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">订单详情</a></p>
				</td>
				<td>
				<?php if ($this->_tpl_vars['value']['order_pay'] == '未支付' && $this->_tpl_vars['value']['order_state'] !== '已取消'): ?><a href="?a=member&m=yeepay&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">付款</a><?php endif; ?>
				<?php if ($this->_tpl_vars['value']['order_state'] == '已取消'): ?>已取消<?php endif; ?>
				<?php if ($this->_tpl_vars['value']['order_delivery'] == '已完成'): ?>已完成<?php endif; ?>
				<?php if ($this->_tpl_vars['value']['order_delivery'] == '已发货'): ?><a href="?a=member&m=harvest&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('请确认是否已收到物品，以免造成钱货两清哦！') ? true : false">确认收货</a> <a href="?a=member&m=&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('请确认是否已收到物品，以免造成钱货两清哦！') ? true : false">退款/退货</a> <?php endif; ?>
				<?php if ($this->_tpl_vars['value']['order_state'] !== '已取消' && $this->_tpl_vars['value']['order_delivery'] !== '已完成' && $this->_tpl_vars['value']['order_delivery'] !== '已发货'): ?><a href="?a=member&m=remove&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">取消<?php endif; ?></a></td>
				<?php endforeach; else: ?>              
				<td colspan="5">没有数据</td>
			</tr>
			<?php endif; unset($_from); ?>
		</table>
		<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>