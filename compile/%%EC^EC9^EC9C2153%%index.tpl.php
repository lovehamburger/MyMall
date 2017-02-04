<?php /* Smarty version 2.6.26, created on 2017-01-29 22:41:07
         compiled from admin/order/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/order/index.tpl', 26, false),)), $this); ?>
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
			<?php $_from = $this->_tpl_vars['allOrder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td>
					<a href="?a=order&m=update&id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['ordernum']; ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</td>
					<td><?php echo $this->_tpl_vars['value']['price']; ?>
</td>
					<td>
						<?php echo $this->_tpl_vars['value']['order_state']; ?>
，<?php echo $this->_tpl_vars['value']['order_pay']; ?>
，<?php echo $this->_tpl_vars['value']['order_delivery']; ?>

					</td>
					<td>
						<a href="?a=order&m=update&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
							<img src="view/admin/images/edit.gif" alt="编辑" title="编辑" />
						</a>
						<a href="?a=order&m=delete&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('你真的要删除这条订单吗？') ? true : false">
							<img src="view/admin/images/drop.gif" alt="删除" title="删除" />
						</a>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr>
					<td colspan="5">没有订单</td>
				</tr>
				<?php endif; unset($_from); ?>
			</table>
		</div>
		<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>

</body>
	</html>