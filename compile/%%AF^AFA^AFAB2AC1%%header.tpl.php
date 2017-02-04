<?php /* Smarty version 2.6.26, created on 2017-01-28 22:47:59
         compiled from default/public/header.tpl */ ?>
<div id="header">
	<h1>
		<a href="./">陈龙辉网站商城</a>
	</h1>
	<div class="top">
		<?php if ($_SESSION['member']): ?>
		您好，<?php echo $_SESSION['member']; ?>
，欢迎再次光临，<a href="?a=member">个人中心</a> | <a href="?a=cart">购物车</a> | <a href="?a=member&m=logout">退出</a>
		<?php else: ?>
		<a href="?a=member&m=login"><img src="view/default/images/bnt_log.gif" alt="登录" /></a>
		<a href="?a=member&m=reg"><img src="view/default/images/bnt_reg.gif" alt="注册" /></a>
		<?php endif; ?>
	</div>
</div>

<div id="nav">
	<ul>
		<li>
			<a href="./" <?php if (! $_GET['navid']): ?>class='strong'<?php endif; ?>>首页</a>
		</li>
		<?php $_from = $this->_tpl_vars['topNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		<li>
			<a href="?a=list&navid=<?php echo $this->_tpl_vars['value']['id']; ?>
" <?php if ($this->_tpl_vars['mainNav']['id'] == $this->_tpl_vars['value']['id']): ?>class='strong'<?php endif; ?>><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
		</li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>

<div id="search"></div>
<div id="sait">
	当前位置：<a href="./">首页</a> <?php $_from = $this->_tpl_vars['BreadNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?> &gt; <a href="?a=list&m=index&navid=<?php echo $this->_tpl_vars['val']['0']['id']; ?>
"><?php echo $this->_tpl_vars['val']['0']['name']; ?>
</a><?php endforeach; endif; unset($_from); ?> <?php if ($_GET['goodsid']): ?>&gt; <?php echo $this->_tpl_vars['detailGoods']['name']; ?>
 <?php endif; ?> <?php if ($_GET['m'] == reg): ?>&gt; 注册会员 <?php endif; ?> <?php if ($_GET['m'] == login): ?>&gt; 会员登录 <?php endif; ?> <?php if ($_GET['a'] == cart): ?>&gt; 购物车 <?php endif; ?> <?php if ($_GET['a'] == member): ?>&gt; 个人中心 <?php endif; ?>
	<?php if ($_GET['m'] == flow): ?>&gt; 结算 <?php endif; ?>
</div>