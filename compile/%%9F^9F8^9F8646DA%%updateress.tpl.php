<?php /* Smarty version 2.6.26, created on 2017-01-29 23:59:12
         compiled from default/public/updateress.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/member.css" />
	<script type="text/javascript" src="view/default/js/jquery.js"></script>
	<script type="text/javascript" src="view/default/js/ress.js"></script>
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/member_sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="main">
		<h2>收货地址</h2>
		<form action="?a=member&m=updateress&id=<?php echo $this->_tpl_vars['oneRess']['id']; ?>
" method="post">
			<dl>
				<dd>
					收 货 人：
					<input type="text" name="name" class="text" value='<?php echo $this->_tpl_vars['oneRess']['name']; ?>
' placeholder="长度不超过25个字符" />
				</dd>
				<dd>
					<span style="float: left; width: 65px;">收货地址：</span>
					<textarea name="address" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息" class="text" style="width:250px;height: 62px"><?php echo $this->_tpl_vars['oneRess']['address']; ?>
</textarea>
				</dd>
				<dd>
					电子邮件：
					<input type="text" value='<?php echo $this->_tpl_vars['oneRess']['email']; ?>
'  name="email" class="text" placeholder="请输入正确的电子邮件"/>
				</dd>
				<dd>
					邮政编码：
					<input type="text" name="code" value='<?php echo $this->_tpl_vars['oneRess']['code']; ?>
'  class="text" placeholder="如您不清楚邮递区号，请填写000000"/>
				</dd>
				<dd>
					手机号码：
					<input type="text" value='<?php echo $this->_tpl_vars['oneRess']['tel']; ?>
'  name="tel" class="text" placeholder="请输入正确的手机号码"/>
				</dd>
				<dd>
					标志建筑：
					<input type="text" value='<?php echo $this->_tpl_vars['oneRess']['buildings']; ?>
'  name="buildings" class="text" placeholder="非必填"/>
				</dd>
				<dd>
					<input type="checkbox" <?php if ($this->_tpl_vars['oneRess']['selected'] == 1): ?>checked="checked"<?php endif; ?> name="selected"/>设置为默认收货地址
				</dd>
				<dd>
					<input type="submit" name="send" value="修改收货地址" class="submit" />
				</dd>
			</dl>
		</form>
	</div>
</body>
</html>