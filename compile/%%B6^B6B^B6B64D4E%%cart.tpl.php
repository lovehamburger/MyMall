<?php /* Smarty version 2.6.26, created on 2017-02-08 17:18:55
         compiled from default/public/cart.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/cart.css" />
	<script type="text/javascript" src="view/default/js/jquery.js"></script>
	<script type="text/javascript" src="view/default/js/cart.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/kf.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<form action="?a=cart&m=flow" method="POST">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<table id="cart" cellspacing="1">
			<tr>
				<th>
					<input type="checkbox" name="allChecked"/>
					全选
				</th>
				<th>名称</th>
				<th>属性</th>
				<th class="th">售价</th>
				<th class="th">数量</th>
				<th class="th">小计</th>
				<th class="th">操作</th>
			</tr>
			<?php $this->assign('total', 0); ?>
		<?php $_from = $this->_tpl_vars['FrontCart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value1']):
?>
		<?php $_from = $this->_tpl_vars['value1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<tr>
				<td id="test">
					<input class="checkbox" type="checkbox" name="cartid[]" val="<?php echo $this->_tpl_vars['value']['price_sale']*$this->_tpl_vars['value']['nums']; ?>
" value='<?php echo $this->_tpl_vars['value']['id']; ?>
'/>
				</td>
				<td>
					<span><?php echo $this->_tpl_vars['value']['name']; ?>
</span>
					<img style="width: 10px;" src="<?php echo $this->_tpl_vars['value']['thumbnail2']; ?>
"/>
				</td>
				<td>
					<span>
						<?php $_from = $this->_tpl_vars['value']['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['value1']):
?>
							<?php echo $this->_tpl_vars['key1']; ?>
:<?php echo $this->_tpl_vars['value1']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</span>
				</td>
				<td class="price" >
					<span val='<?php echo $this->_tpl_vars['value']['price_sale']; ?>
'><?php echo $this->_tpl_vars['value']['price_sale']; ?>
/元</span>
				</td>
				<td> <b onclick="minus(this)" class="minus">-</b>
					<span>
						<input  disabled="disabled" type="text" name="nums" val="<?php echo $this->_tpl_vars['value']['id']; ?>
" class="small" value="<?php echo $this->_tpl_vars['value']['nums']; ?>
" />
					</span> <b onclick="plus(this)" class="plus" val='<?php echo $this->_tpl_vars['value']['inventory']; ?>
'>+</b>
				</td>
				<td class="price">
					<span class="subtotal" val='<?php echo $this->_tpl_vars['value']['price_sale']*$this->_tpl_vars['value']['nums']; ?>
'><?php echo $this->_tpl_vars['value']['price_sale']*$this->_tpl_vars['value']['nums']; ?>
/元</span>
				</td>
				<td>
					<a href="?a=cart&m=delete&id=<?php echo $this->_tpl_vars['value']['id']; ?>
" onclick="return confirm('确定要删除吗') ? true : false">删除</a>
				</td>
			
			</tr>
			<?php endforeach; endif; unset($_from); ?>
			<?php endforeach; else: ?>
				<td colspan="7">没有任何数据</td>
		<?php endif; unset($_from); ?>
		</table>
		<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
		<p>
			<a href="./">继续购物</a>
			|
			<a href="?a=cart&m=delete" onclick="return confirm('确定要清空所有购物车数据吗') ? true : false">清空购物车</a>
			| 共计： <strong class="price sumprice"><?php echo $this->_tpl_vars['total']; ?>
</strong>
			/元
		</p>

		<p>
			<!-- <input type="submit" style="background: url(view/default/images/checkout.gif) no-repeat;width:144px;height:35px">
			-->
			<button  type="submit"  style="background: url(view/default/images/checkout.gif) no-repeat;width:144px;height:35px"></button>
		</p>
	</form>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>