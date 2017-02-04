<?php /* Smarty version 2.6.26, created on 2017-01-31 20:08:20
         compiled from admin/nav/add.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/nav.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/nav.js"></script>
</head>
<body>
	<h2>
		商品————新增导航
		<a href="?a=nav">返回导航列表页</a>
	</h2>
	 <form method="post" action="?a=nav&m=add">
		<dl class="form">
				<input type="hidden" name="ajaxUser" val="" />
			<?php if ($this->_tpl_vars['oneNav']): ?>
			<dd>
				主&nbsp;导&nbsp;航：
				<?php echo $this->_tpl_vars['oneNav']['0']['name']; ?>

			</dd>
				<input type="hidden" name="sid" value="<?php echo $this->_tpl_vars['oneNav']['0']['id']; ?>
" />
			<?php endif; ?>
			<dd>
				名&nbsp;&nbsp;称：
				<input type="text" name="name" placeholder="请输入导航名称" />
			</dd>
			<dd>
				简&nbsp;&nbsp;介：
				<textarea name="info" placeholder="请输入导航简介"></textarea>
			</dd>
			<?php if ($this->_tpl_vars['oneNav']): ?>
			<dd>
				品&nbsp;&nbsp;牌：
				<?php $_from = $this->_tpl_vars['Breads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
					<input type="checkbox" name="bread[]" value="<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>

				<?php endforeach; endif; unset($_from); ?>
			</dd>
			<?php endif; ?>
			<dd>
				价格区间：
				<?php $_from = $this->_tpl_vars['Price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
					<input type="checkbox" name="price[]" value="<?php echo $this->_tpl_vars['value']['price']; ?>
"><?php echo $this->_tpl_vars['value']['price']; ?>

				<?php endforeach; endif; unset($_from); ?>
			</dd>
			<dd>
				<button onclick="return addNav()" class="submit" type="submit"  name="sub" >新增导航</button>
			</dd>
		</dl>
	</form> 
</body>
</html>