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
</head>
<body>
	<h2>
		商品————新增商品
		<a href="?a=goods">返回商品列表</a>
	</h2>
	<form method="post" action="?a=goods&m=add">
		<dl class="form">
			<input type="hidden" name="get" class="text" value=''/>
			<dd>
				商品类别：
				<select name="nav">
					<option value="-1">--请选择一个商品类别--</option>
					{foreach from=$addNav key=key item=value}
					{if $value.sub}
					<option disabled="disabled" value="{$value.id}">{$value.name}</option>
					{foreach from=$value.sub key=key1 item=value1}
					<option value="{$key1}" >&nbsp;&nbsp;&nbsp;&nbsp;|——{$value1}</option>
					{/foreach}
					{else}
					<option disabled="disabled" value="{$value.id}">{$value.name}</option>
					{/if}
					{/foreach}
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
				<input type="text" name="name" class="text" />
				<span class="red">[必填]</span>
				( * 2-100字符之间 )
			</dd>
			<dd>
				商品编号：
				<input type="text" name="sn" class="text" />
				<input type="hidden" name="ajaxSn" class="text" val=''/>
				<span class="red">[必填]</span>
				( * 2-50字符之间，唯一 )
			</dd>
			<dd>
				销 售 价：
				<input type="text" name="price_sale" value="0" class="text small" />
				市 场 价：
				<input type="text" name="price_market" value="0"  class="text small" />
				成 本 价：
				<input type="text" name="price_cost" value="0"  class="text small" />
				( * 成本价不在前台显示 )
			</dd>
			<dd>
				关 键 字：
				<input type="text" name="keyword" class="text" />
				( * 例：纯棉|换季|白色；每个关键字用'|'隔开)
			</dd>
			<dd>
				计量单位：
				<input type="text" name="unit" class="text small" />
				重　　量：
				<input type="text" name="weight" value="0" class="text small" />
				( * 计量单位：个,kg,件；重量：默认kg)
			</dd>
			<dd  class="attr" style="display: none">
				
			</dd>
			<dd>
				上传图片:
				<input type="file" class="img" name="upimg"></dd>
			<dd>
				<img src="" id="showimg" >
				<input type="hidden" name="thumbnail" id="thumbnail" value=""></dd>
			<dd>
				商品详情:
				<textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea>
			</dd>
			<iframe src="" name="upload" width="100%" style="display: none"></iframe>
			<dd>
				是否上架：
				<input type="radio" name="is_up" value="1" checked="checked" />
				是
				<input type="radio" name="is_up" value="0" />
				否  

				是否推荐：
				<input type="radio" name="recommend" value="1"  />
				是
				<input type="radio" name="recommend" value="0" checked="checked"/>
				否
				　　
				免 运 费：
				<input type="radio" name="is_freight" value="1" checked="checked" />
				是
				<input type="radio" name="is_freight" value="0" />
				否
			</dd>
			<dd>
				库　　存：
				<input type="text" name="inventory" value="100" class="text small" />
				库存告急：
				<input type="text" name="warn_inventory" value="1" class="text small" />
				( * 库存达到指定数量就会在后台提醒 )
			</dd>
			<dd>
				<input onclick="return addGoods()" type="submit" value="新增商品" name="sub" >
				<input type="reset" value="重置" />
			</dd>
		</dl>
	</form>
</body>
</html>