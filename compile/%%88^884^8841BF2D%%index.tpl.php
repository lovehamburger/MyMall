<?php /* Smarty version 2.6.26, created on 2017-01-29 13:24:24
         compiled from admin/bread/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/bread/index.tpl', 28, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
</head>
<body>
	<h2>
		商品————品牌列表页
		<a href="?a=bread&m=add">添加品牌</a>
	</h2>
	<div id="list">
		<table>
			<tr>
				<th>品牌名称</th>
				<th>品牌信息</th>
				<th>官方网站</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['allBread']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td id="read"><?php echo $this->_tpl_vars['value']['name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['info']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['url']; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['reg_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</td>
				<td>
					<a href="?a=bread&m=update&id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" /></a>
					<a href="?a=bread&m=delete&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('确定要删除数据吗?') ? true : false"><img src="view/admin/images/drop.gif" alt="删除" title="删除" /></a>
				</td>
				<?php endforeach; else: ?>
				<td colspan="5">没有任何数据</td>
			</tr>
			<?php endif; unset($_from); ?>
		</table>
	</div>
	<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
</body>
</html>