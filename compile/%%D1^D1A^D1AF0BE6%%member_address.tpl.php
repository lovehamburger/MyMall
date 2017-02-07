<?php /* Smarty version 2.6.26, created on 2017-02-07 23:38:32
         compiled from default/public/member_address.tpl */ ?>
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
		<form action="?a=member&m=address" method="post">
			<dl>
				<dd>
					收 货 人：
					<input type="text" name="name" class="text" placeholder="长度不超过25个字符" />
				</dd>
				<dd>
					<span style="float: left; width: 65px;">收货地址：</span>
					<textarea name="address" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息" class="text" style="width:250px;height: 62px"></textarea>
				</dd>
				<dd>
					电子邮件：
					<input type="text" name="email" class="text" placeholder="请输入正确的电子邮件"/>
				</dd>
				<dd>
					邮政编码：
					<input type="text" name="code" class="text" placeholder="如您不清楚邮递区号，请填写000000"/>
				</dd>
				<dd>
					手机号码：
					<input type="text" name="tel" class="text" placeholder="请输入正确的手机号码"/>
				</dd>
				<dd>
					标志建筑：
					<input type="text" name="buildings" class="text" placeholder="非必填"/>
				</dd>
				<dd>
					<input type="checkbox" name="selected"/>设置为默认收货地址
				</dd>
				<dd>
					<input type="submit" name="send" value="" class="submit" />
				</dd>
			</dl>
		</form>
		<table id="cart" cellspacing="1">
			<tr>
				<th>收货人</th>
				<th>地址</th>
				<th>邮编</th>
				<th>电话</th>
				<th>电子邮件</th>
				<th>标志性建筑</th>
				<th>操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['allMemberress']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['value']['name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['address']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['code']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['tel']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['email']; ?>
</td>
				<td><?php echo $this->_tpl_vars['value']['buildings']; ?>
</td>
				<td>
					<?php if ($this->_tpl_vars['value']['selected'] == 1): ?>
					<span class="selected" style="color:green;" val="<?php echo $this->_tpl_vars['value']['id']; ?>
">是</span>
					<?php else: ?>
					<span class="select" onclick="selected(<?php echo $this->_tpl_vars['value']['id']; ?>
,this)">首选</span>
					<?php endif; ?>	
		 | 修改 | 删除
				</td>
			</tr>
			<?php endforeach; else: ?>
			<td colspan="7">暂无数据╥﹏╥...</td>
			<?php endif; unset($_from); ?>
		</table>
		<p style="text-align:center;margin:5px 0;">
			<a href="?a=cart&m=flow">[去结算中心]</a>
		</p>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>