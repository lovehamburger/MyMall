<?php /* Smarty version 2.6.26, created on 2017-02-09 11:11:47
         compiled from admin/goods/update.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/goods.js"></script>
	<script type="text/javascript" charset="utf-8" src="api/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="api/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
		var BREAD = <?php echo $this->_tpl_vars['oneGoods']['0']['bread']; ?>
 ? <?php echo $this->_tpl_vars['oneGoods']['0']['bread']; ?>
 : 0;//以JS做通信
	</script>
</head>
<body>
	<h2>
		商品————修改商品
		<a href="?a=goods">返回商品列表</a>
	</h2>
	<form method="post" action="?a=goods&m=update&id=<?php echo $this->_tpl_vars['oneGoods']['0']['id']; ?>
">
		<dl class="form">
			<input type="hidden" name="get" class="text" value='<?php echo $this->_tpl_vars['oneGoods']['0']['id']; ?>
'/>
			<input type="hidden" name="attr" class="text" value='<?php echo $this->_tpl_vars['oneGoods']['0']['attr']; ?>
'/>
			<dd>
				商品类别：
				<select name="nav">
					<option value="-1">--请选择一个商品类别--</option>
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
					<option value="<?php echo $this->_tpl_vars['key1']; ?>
" <?php if ($this->_tpl_vars['oneGoods']['0']['nav'] == $this->_tpl_vars['key1']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;|——<?php echo $this->_tpl_vars['value1']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<option disabled="disabled" value="<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</option>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				<span class="red">[必填]</span>
			</dd>
			<dd>
				商品品牌：
				<select name="bread">
					<option value="-1">--请选择一个商品品牌--</option>
				</select>
				<span class="red">[必填]</span>
			</dd>
			<dd>
				商品名称：
				<input type="text" name="name" class="text" value="<?php echo $this->_tpl_vars['oneGoods']['0']['name']; ?>
"/>
				<span class="red">[必填]</span>
				( * 2-100字符之间 )
			</dd>
			<dd>
				商品编号：
				<input type="text" name="sn" class="text" value="<?php echo $this->_tpl_vars['oneGoods']['0']['sn']; ?>
"/>
				<input type="hidden" name="ajaxSn" class="text" val=''/>
				<span class="red">[必填]</span>
				( * 2-50字符之间 )
			</dd>
			<dd>
				销 售 价：
				<input type="text" name="price_sale"  class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['price_sale']; ?>
"/>
				市 场 价：
				<input type="text" name="price_market"   class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['price_market']; ?>
"/>
				成 本 价：
				<input type="text" name="price_cost"   class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['price_cost']; ?>
"/>
				( * 成本价不在前台显示 )
			</dd>
			<dd>
				关 键 字：
				<input type="text" name="keyword" class="text" value="<?php echo $this->_tpl_vars['oneGoods']['0']['keyword']; ?>
"/>
				( * 例：纯棉|换季|白色；每个关键字用'|'隔开)
			</dd>
			<dd>
				计量单位：
				<input type="text" name="unit" class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['unit']; ?>
"/>
				重　　量：
				<input type="text" name="weight"  class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['weight']; ?>
"/>
				( * 计量单位：个,kg,件；重量：默认kg)
			</dd>
			<dd  class="attr" style="display: none">
				
			</dd>
			<dd>
				上传图片:
				<input type="file" class="img" name="upimg"></dd>
			<dd>
				<?php if ($this->_tpl_vars['oneGoods']['0']['thumbnail']): ?>
				<img src="<?php echo $this->_tpl_vars['oneGoods']['0']['thumbnail']; ?>
" id="showimg" >
				<input type="hidden" name="thumbnail" id="thumbnail" value="<?php echo $this->_tpl_vars['oneGoods']['0']['thumbnail']; ?>
">
				<?php else: ?>
				<img src="" id="showimg" >
				<input type="hidden" name="thumbnail" id="thumbnail" value=""><?php endif; ?></dd>
			<dd>
				商品详情:
				<textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"><?php echo $this->_tpl_vars['oneGoods']['0']['content']; ?>
</textarea>
			</dd>
			<iframe src="" name="upload" width="100%" style="display: none"></iframe>
			<dd>
				是否上架：
				<input type="radio" name="is_up" value="1" <?php if ($this->_tpl_vars['oneGoods']['0']['is_up'] == 1): ?>checked="checked"<?php endif; ?> />
				是
				<input type="radio" name="is_up" value="0" <?php if ($this->_tpl_vars['oneGoods']['0']['is_up'] == 0): ?>checked="checked"<?php endif; ?>/>
				否
				是否推荐：
				<input type="radio" name="recommend" value="1" <?php if ($this->_tpl_vars['oneGoods']['0']['recommend'] == 1): ?>checked="checked"<?php endif; ?> />
				是
				<input type="radio" name="recommend" value="0" <?php if ($this->_tpl_vars['oneGoods']['0']['recommend'] == 0): ?>checked="checked"<?php endif; ?>/>
				否　　
				免 运 费：
				<input type="radio" name="is_freight" value="1" <?php if ($this->_tpl_vars['oneGoods']['0']['is_up'] == 1): ?>checked="checked"<?php endif; ?> />
				是
				<input type="radio" name="is_freight" value="0" <?php if ($this->_tpl_vars['oneGoods']['0']['is_up'] == 0): ?>checked="checked"<?php endif; ?>/>
				否
			</dd>
			<dd>
				库　　存：
				<input type="text" name="inventory"  class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['inventory']; ?>
"/>
				库存告急：
				<input type="text" name="warn_inventory"  class="text small" value="<?php echo $this->_tpl_vars['oneGoods']['0']['warn_inventory']; ?>
"/>
				( * 库存达到指定数量就会在后台提醒 )
			</dd>
			<dd>
				销售量：
				<?php echo $this->_tpl_vars['oneGoods']['0']['sales']; ?>

			</dd>
			<dd>
				<input onclick="return updateGoods()" type="submit" value="修改商品" name="sub" >
				<input type="reset" value="重置" />
			</dd>
		</dl>
	</form>
</body>
</html>