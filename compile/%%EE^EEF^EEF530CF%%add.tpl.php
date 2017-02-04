<?php /* Smarty version 2.6.26, created on 2017-01-29 09:41:41
         compiled from admin/attr/add.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/attr.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/attr.js"></script>
</head>
<body>
	<h2>
		商品————新增属性
		<a href="?a=attr">返回属性列表</a>
	</h2>
	 <form method="post" action="?a=attr&m=add">
	 <input type="hidden" name="ajaxName" val="">
		<dl class="form">
			<dd>
				属性名称：
				<input type="text" name="name" placeholder="请输入属性名称" /><span class="red">[必填]</span>
			</dd>
			<dd>
				是否单选：
				<input type="radio" name="way" value="0" checked="checked" />单选
				<input type="radio" name="way" value="1" />多选
			</dd>
			<dd>
				属性简介：
				<textarea name="info" placeholder="请输入属性简介"></textarea><span class="red">[必填](用"|"分割开,例如:白色|红色|蓝色|)</span>( * 2-6位之间 )
			</dd>
			<dd>
				商品类别：
					<?php $_from = $this->_tpl_vars['addNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
					<?php if ($this->_tpl_vars['value']['sub']): ?>
					<option disabled="disabled" value="<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</option>
					<?php $_from = $this->_tpl_vars['value']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['value1']):
?>
					<input type="checkbox" name="nav[]" value="<?php echo $this->_tpl_vars['key1']; ?>
" ><?php echo $this->_tpl_vars['value1']; ?>

					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<option type="checkbox" disabled="disabled" value="<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</option>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
			</dd>
			<dd>
				<button onclick="return addAttr()" class="submit" type="submit"  name="sub" >新增属性</button>
			</dd>
		</dl>
	</form> 
</body>
</html>