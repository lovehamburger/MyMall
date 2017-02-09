<?php /* Smarty version 2.6.26, created on 2017-02-08 16:51:56
         compiled from default/public/flow.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/flow.css" />
	<script type="text/javascript" src="view/default/js/jquery.js"></script>
	<script type="text/javascript" src="view/default/js/flow.js"></script>
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
	<form method="post" name="flow" action="?a=cart&m=order">
		<table id="cart" cellspacing="1">
			<caption>商品列表</caption>
			<tr>
				<th>名称</th>
				<th>属性</th>
				<th class="th">售价</th>
				<th class="th">数量</th>
				<th class="th">小计</th>
			</tr>
			<?php $this->assign('total', 0); ?>
			<?php $_from = $this->_tpl_vars['FrontCart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['value']['nums']*$this->_tpl_vars['value']['price_sale']); ?>
				<tr class="cart">
					<td><?php echo $this->_tpl_vars['value']['name']; ?>
</td>
					<td>
						<?php $_from = $this->_tpl_vars['value']['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['value1']):
?>
							<?php echo $this->_tpl_vars['key1']; ?>
:<?php echo $this->_tpl_vars['value1']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</td>
					<td><?php echo $this->_tpl_vars['value']['price_sale']; ?>
</td>
					<td><?php echo $this->_tpl_vars['value']['nums']; ?>
</td>
					<td style="color: green"><?php echo $this->_tpl_vars['value']['nums']*$this->_tpl_vars['value']['price_sale']; ?>
/元</td>
					<td style="display: none" name="cartid"><?php echo $this->_tpl_vars['value']['id']; ?>
</td>
					<td style="display: none" name="goodsid"><?php echo $this->_tpl_vars['value']['goods_id']; ?>
</td>
				</tr>	
			<?php endforeach; endif; unset($_from); ?>
		</table>

		<p>
			<a href="?a=cart">返回修改</a>
			| 商品总计： <strong class="price sumprice"><?php echo $this->_tpl_vars['total']; ?>
</strong>
			/元
		</p>
		</form>
			<p  style="font-size: 14px;font-weight: bold;margin: 5px 0;color: #026ACB;text-align:center">收货人信息</p>
			<?php $_from = $this->_tpl_vars['selectedRess']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<input type="radio" class="ress" name=[] value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['value']['selected'] == 1): ?>checked="checked"<?php endif; ?> >
			 <?php echo $this->_tpl_vars['value']['address']; ?>
 (<?php echo $this->_tpl_vars['value']['name']; ?>
) <?php echo $this->_tpl_vars['value']['tel']; ?>

			 <table style="display: none">
				<tr>
					<td width="25%">收货人信息：</td>
					<td width="25%" name='name'><?php echo $this->_tpl_vars['value']['name']; ?>
</td>
					<td width="25%">电子邮件：</td>
					<td width="25%" name='email'><?php echo $this->_tpl_vars['value']['email']; ?>
</td>
				</tr>
				<tr>
					<td>收货人地址：</td>
					<td name='address'><?php echo $this->_tpl_vars['value']['address']; ?>
</td>
					<td>邮政编码：</td>
					<td name='code'><?php echo $this->_tpl_vars['value']['code']; ?>
</td>
				</tr>
				<tr>
					<td>手机信息：</td>
					<td name='tel'><?php echo $this->_tpl_vars['value']['tel']; ?>
</td>
					<td>标志性建筑：</td>
					<td name='buildings'><?php echo $this->_tpl_vars['value']['buildings']; ?>
</td>
				</tr>
			</table>
				
			<!--<div style="display:inline-block;display: none;">
				<span><?php echo $this->_tpl_vars['value']['email']; ?>
</span>
				<span><?php echo $this->_tpl_vars['value']['code']; ?>
</span>
				<span><?php echo $this->_tpl_vars['selectedRess']['buildings']; ?>
</span>
			</div> -->
			<a onclick="openwindow('?a=member&m=updateress&id=<?php echo $this->_tpl_vars['value']['id']; ?>
','',900,600)">修改收货地址</a>
			<br/>			
			<?php endforeach; endif; unset($_from); ?>
			

		<table id="cart" cellspacing="1">
			<caption>物流配送信息</caption>
			<tr>
				<th width="10%"></th>
				<th width="20%">名称</th>
				<th width="50%">描述</th>
				<th>运费</th>
			</tr>
			<tr>
				<td>
					<input title="申通快递" type="radio" name="delivery_radio" value="10" onclick="changeDelivery(this);" checked="checked" />
				</td>
				<td>申通快递</td>
				<td>江浙沪6元起步，省外11元起步，1公斤内，额外的1公斤加10元。</td>
				<td>10元</td>
			</tr>
			<tr>
				<td>
					<input title="邮政EMS" type="radio" name="delivery_radio" value="20" onclick="changeDelivery(this);"  />
				</td>
				<td>邮政EMS</td>
				<td>江浙沪12元起步，省外20元起步，1公斤内，额外的1公斤加10元。</td>
				<td>20元</td>
			</tr>
			<tr>
				<td>
					<input title="邮政平邮" type="radio" name="delivery_radio" value="6" onclick="changeDelivery(this);"  />
				</td>
				<td>邮政平邮</td>
				<td>无</td>
				<td>6元</td>
			</tr>
		</table>

		<p>
			您要支付的运费为： <strong id="delivery"></strong>
			/元
		</p>

		<table id="cart" cellspacing="1">
			<caption>支付方式</caption>
			<tr>
				<th width="10%"></th>
				<th width="20%">名称</th>
				<th width="50%">描述</th>
				<th>手续费</th>
			</tr>
			<tr>
				<td>
					<input title="支付宝" type="radio" name="pay_radio" value="0" onclick="changePay(this);" checked="checked" />
				</td>
				<td>支付宝</td>
				<td>通过支付宝在线支付</td>
				<td>0/元</td>
			</tr>
			<tr>
				<td>
					<input title="银行转账/汇款" type="radio" name="pay_radio" value="2" onclick="changePay(this);" />
				</td>
				<td>银行转账/汇款</td>
				<td>通过转账汇款，联系客服，提供汇款清单和商品订单号</td>
				<td>2/元</td>
			</tr>
			<tr>
				<td>
					<input  title="货到付款" type="radio" name="pay_radio" value="0" onclick="changePay(this);" />
				</td>
				<td>货到付款</td>
				<td>通过配送人员，送货上门，收取费用</td>
				<td>0/元</td>
			</tr>
		</table>

		<p>
			您要支付的手续费为：
			<strong id="pay"></strong>
			/元
		</p>

		<table id="cart" cellspacing="1">
			<caption>备注信息</caption>
			<tr>
				<th width="30%"'>订单备注：</th>
				<td class="left">
					<textarea name="text"></textarea>
				</td>
			</tr>
			<tr>
				<th>缺货处理：</th>
				<td class="left">
					<input type="radio" value="0" name="ps" checked="checked" />
					先发有货的
					<input type="radio" value="1" name="ps" />
					等货物全了再发
					<input type="radio" value="2" name="ps" />
					取消订单
				</td>
			</tr>
			</table>

			<p id="total">
				商品总计：
				<strong class="sumprice">3</strong>
				/元 + 物流运费：
				<strong class="delivery">4</strong>
				/元 + 支付手续费：
				<strong class="pay">5</strong>
				/元
			</p>

			<p>
				您总共要支付的金额为：
				<strong class="price" id="price" >0</strong>
				/元
			</p>

			<p style="text-align:center;">
				<div style="border: none;text-align:center;" name="sendOrder"><img src="view/default/images/order.gif" alt="提交订单" /></div>
			</p>
		</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
	</html>