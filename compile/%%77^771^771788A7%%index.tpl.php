<?php /* Smarty version 2.6.26, created on 2017-01-29 12:35:58
         compiled from admin/nav/index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/nav.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
</head>
<body>
	<h2>
		商品————商品导航页
		<a href="?a=nav&m=add<?php if ($_GET['id']): ?>&id=<?php echo $_GET['id']; ?>
<?php endif; ?>">添加导航</a>
	</h2>
	<div id="list">
		<form method="POST" action="?a=nav&m=sort">
			<table>
				<tr>
					<th>序号</th>
					<th>名称</th>
					<th>简介</th>
					<?php if ($this->_tpl_vars['oneNav']): ?><th>品牌</th><?php else: ?><th>子类</th><?php endif; ?>
					<th>排序</th>
					<th>操作</th>
				</tr>
				<?php $_from = $this->_tpl_vars['allNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
				<tr>
					<td id="read"><?php echo $this->_tpl_vars['key']+1; ?>
</td>
					<td><?php echo $this->_tpl_vars['value']['name']; ?>
</td>
					<td><?php echo $this->_tpl_vars['value']['info']; ?>
</td>
					<td>
						<?php if ($this->_tpl_vars['oneNav']): ?>
						<?php echo $this->_tpl_vars['value']['bread']; ?>

						<?php else: ?>
						<a href="?a=nav&m=index&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">查看</a>|<a href="?a=nav&m=add&id=<?php echo $this->_tpl_vars['value']['id']; ?>
">添加</a>
						<?php endif; ?>
					</td>
					<td><input type="text" class="sort" name="<?php echo $this->_tpl_vars['value']['id']; ?>
" value="<?php echo $this->_tpl_vars['value']['sort']; ?>
"></td>
					<td>
						<a href="?a=nav&m=update&id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><img src="view/admin/images/edit.gif"   alt="编辑" title="编辑" /></a>
						<a href="?a=nav&m=delete&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('确定要删除数据吗?') ? true : false"><img src="view/admin/images/drop.gif" alt="删除" title="删除" /></a>
					</td>
					<?php endforeach; else: ?>
					<td colspan="6">没有任何数据</td>
				</tr>
				<?php endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['allNav']): ?><tr><td><td><td><td><td><input type="submit" value="排序"><td></td></td></td></td></td></td></tr><?php endif; ?>
				<?php if ($this->_tpl_vars['oneNav']): ?><tr><td colspan="6">主类名称：[<?php echo $this->_tpl_vars['oneNav']['0']['name']; ?>
] <a href="?a=nav">[返回]</a></td></tr><?php endif; ?>
			</table>
		</form>
	</div>
	<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
</body>
</html>