<?php /* Smarty version 2.6.26, created on 2017-01-29 09:41:37
         compiled from admin/attr/index.tpl */ ?>
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
		商品————自定义属性列表页
		<a href="?a=attr&m=add">添加自定义属性</a>
	</h2>
	<div id="list">
		<table>
			<tr>
				<th>属性名称</th>
				<th>属性信息</th>
				<th>是否多选</th>
				<th>属性类别</th>
				<th>操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['allAttr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td id="read"><?php echo $this->_tpl_vars['value']['name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['info']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['way']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['nav']; ?>
</td>
				<td>
					<a href="?a=attr&m=update&id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" /></a>
					<a href="?a=attr&m=delete&id=<?php echo $this->_tpl_vars['value']['id']; ?>
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