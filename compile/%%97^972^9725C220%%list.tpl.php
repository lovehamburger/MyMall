<?php /* Smarty version 2.6.26, created on 2017-02-08 19:15:23
         compiled from default/public/list.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/list.css" />
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/kf.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="sidebar">
		<h2><?php echo $this->_tpl_vars['mainNav']['name']; ?>
</h2>
		<ul>
			<?php $_from = $this->_tpl_vars['mainNav']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
			<li>
				<a href="?a=list&m=index&navid=<?php echo $this->_tpl_vars['val']['id']; ?>
">
					<?php echo $this->_tpl_vars['val']['name']; ?>

					<span class="gray">(1000)</span>
				</a>
			</li>
			<?php endforeach; else: ?>
			<span>暂无数据╥﹏╥...</span>
			<?php endif; unset($_from); ?>
		</ul>
		<h2>当月热销</h2>
		<div style="margin:0 0 10px 0">
		<?php $_from = $this->_tpl_vars['hotProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<dl>
				<dt>
					<a href="?a=details&id=11">
						<img style="width: 102px;height: 102px" src="<?php echo $this->_tpl_vars['value']['thumbnail2']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
" title="<?php echo $this->_tpl_vars['value']['name']; ?>
" />
					</a>
				</dt>
				<dd class="price">￥<?php echo $this->_tpl_vars['value']['price_sale']; ?>
</dd>
				<dd class="title">
					<a href="?a=details&id=11"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
				</dd>
			</dl>
		<?php endforeach; endif; unset($_from); ?>
			<p>
				<a href="?a=details&id=11">查看更多</a>
			</p>
		</div>
		<h2>浏览记录</h2>
		<div style="margin:0 0 10px 0">
			<dl>
				<dt>
					<a href="?a=details&id=11">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="?a=details&id=11">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="?a=details&id=11">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="?a=details&id=11">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="?a=details&id=11">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="?a=details&id=11">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<p>
				<a href="?a=details&id=11">查看更多</a>
				<a href="?a=details&id=11">清空</a>
			</p>
		</div>
	</div>

	<div id="main">
		<h2>商品筛选</h2>
		<div class="filter">
			<?php if ($this->_tpl_vars['navBread']): ?>
				<p>
					品牌：
					<?php if ($_GET['bread']): ?>
					<a href="?a=list&navid=<?php echo $_GET['navid']; ?>
&attr=<?php echo $_GET['attr']; ?>
&price=<?php echo $_GET['price']; ?>
">全部</a>
					<?php else: ?>
					<span><a href="?a=list&navid=<?php echo $_GET['navid']; ?>
&attr=<?php echo $_GET['attr']; ?>
&price=<?php echo $_GET['price']; ?>
">全部</a></span>
					<?php endif; ?>
					<?php $_from = $this->_tpl_vars['navBread']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
						<?php if ($_GET['bread'] == $this->_tpl_vars['key']): ?>
						<span><a href="<?php echo $this->_tpl_vars['url']; ?>
&bread=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a></span>
						<?php else: ?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
&bread=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</p>
			<?php endif; ?>
			<?php $_from = $this->_tpl_vars['navAttr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<p>
				<?php echo $this->_tpl_vars['key']; ?>
：
				<?php if ($_GET['attr']): ?>
					<a href="?a=list&navid=<?php echo $_GET['navid']; ?>
&bread=<?php echo $_GET['bread']; ?>
&price=<?php echo $_GET['price']; ?>
">全部</a>
					<?php else: ?>
					<span><a href="?a=list&navid=<?php echo $_GET['navid']; ?>
&bread=<?php echo $_GET['bread']; ?>
&price=<?php echo $_GET['price']; ?>
">全部</a></span>
				<?php endif; ?>
				<?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['value1']):
?>
					<?php if ($_GET['attr'] == $this->_tpl_vars['value1']): ?>
						<span><a href="<?php echo $this->_tpl_vars['url']; ?>
&attr=<?php echo $this->_tpl_vars['value1']; ?>
"><?php echo $this->_tpl_vars['value1']; ?>
</a></span>
					<?php else: ?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
&attr=<?php echo $this->_tpl_vars['value1']; ?>
"><?php echo $this->_tpl_vars['value1']; ?>
</a>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</p>
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['navPrice']): ?>
				<p>
					价格：
					<?php if ($_GET['price']): ?>
					<a href="?a=list&navid=<?php echo $_GET['navid']; ?>
&bread=<?php echo $_GET['bread']; ?>
">全部</a>
					<?php else: ?>
					<span><a href="?a=list&navid=<?php echo $_GET['navid']; ?>
&bread=<?php echo $_GET['bread']; ?>
">全部</a></span>
					<?php endif; ?>
					<?php $_from = $this->_tpl_vars['navPrice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
						<?php if ($_GET['price'] == $this->_tpl_vars['key']): ?>
						<span><a href="<?php echo $this->_tpl_vars['url']; ?>
&price=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a></span>
						<?php else: ?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
&price=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</p>
			<?php endif; ?>
		</div>
		<h2>商品列表</h2>
		<div class="pro">
		<?php $_from = $this->_tpl_vars['allGoods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<dl>
				<dt>
					<a href="?a=details&navid=<?php echo $this->_tpl_vars['value']['nav']; ?>
&goodsid=<?php echo $this->_tpl_vars['value']['id']; ?>
">
						<img src="<?php echo $this->_tpl_vars['value']['thumbnail2']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
" title="<?php echo $this->_tpl_vars['value']['name']; ?>
" />
					</a>
				</dt>
				<dd class="price"> <strong>￥<?php echo $this->_tpl_vars['value']['price_sale']; ?>
</strong> <del>￥<?php echo $this->_tpl_vars['value']['price_market']; ?>
</del>
				</dd>
				<dd class="title">
					<a href="?a=details&id=11"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
				</dd>
				<dd class="commend">
					<a href="?a=details&id=11">已有34人评价</a>
				</dd>
				<dd class="buy">
					<a href="?a=details&id=11">购买</a>
					|
					<a href="?a=details&id=11">收藏</a>
					|
					<a href="?a=details&id=11">比较</a>
				</dd>
			</dl>
			<?php endforeach; else: ?>
			没有数据
			<?php endif; unset($_from); ?>
			<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
		</div>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>