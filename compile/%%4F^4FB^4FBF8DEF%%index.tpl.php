<?php /* Smarty version 2.6.26, created on 2017-01-29 09:42:28
         compiled from admin/goods/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'admin/goods/index.tpl', 30, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/goods.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/goods.js"></script>
</head>
<body>
	<h2>
		商品————商品列表页
		<a href="?a=goods&m=add">添加商品</a>
	</h2>
	<div id="list">
		<table>
			<tr>
				<th>商品名称</th>
				<th>商品编号</th>
				<th>商品售价</th>
				<th>商品类型</th>
				<th>品牌</th>
				<th>是否上架</th>
				<th>库存</th>
				<th>操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['allGoods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td id="read"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['gname'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18) : smarty_modifier_truncate($_tmp, 18)); ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['sn']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['price_sale']; ?>
/元</td>
				<td><?php echo $this->_tpl_vars['value']['nname']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['bread']; ?>
</td>
				<?php if ($this->_tpl_vars['value']['is_up'] != 1): ?>
				<td>
					<span class="red">
						否
						<a onclick="is_up(this,<?php echo $this->_tpl_vars['value']['id']; ?>
)">[上架]</a>
					</span>
				</td>
				<?php else: ?>
				<td>
					<span class="green">
						是
						<a onclick="is_down(this,<?php echo $this->_tpl_vars['value']['id']; ?>
)">[下架]</a>
					</span>
				</td>
				<?php endif; ?>
				<td><?php echo $this->_tpl_vars['value']['inventory']; ?>
</td>
				<td>
					<a href="?a=goods&m=update&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
						<img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" />
					</a>
					<a href="?a=goods&m=delete&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('确定要删除数据吗?') ? true : false">
						<img src="view/admin/images/drop.gif" alt="删除" title="删除" />
					</a>
				</td>
				<?php endforeach; else: ?>
				<td colspan="8">没有任何数据</td>
			</tr>
			<?php endif; unset($_from); ?>
		</table>
	</div>
	<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
</body>
</html>