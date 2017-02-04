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
		商品————修改导航
		<a href="?a=nav">返回导航列表页</a>
	</h2>
	 <form method="post" action="?a=nav&m=update&id={$oneNav.0.id}">
		<dl class="form">
				<input type="hidden" name="ajaxUser" val="" />
			<dd>
				名&nbsp;&nbsp;称：
				{$oneNav.0.name}
			</dd>
			<dd>
				简&nbsp;&nbsp;介：
				<textarea name="info"  placeholder="请输入导航简介">{$oneNav.0.info}</textarea>
			</dd>
			{if $oneNav.0.sid neq 0}
			<dd>
				品&nbsp;&nbsp;牌：
				{foreach from=$Breads key=key item=value}
				<input type="checkbox" name="bread[]"  {if in_array($value.id, $oneNav.0.bread)}checked="checked"{/if} value="{$value.id}">{$value.name}
				{/foreach}
			</dd>
			{/if}
			<dd>
				价格区间：
				{foreach from=$Price key=key item=value}
					<input type="checkbox" name="price[]" {if in_array($value.price, $oneNav.0.price)}checked="checked"{/if} value="{$value.price}">{$value.price}
				{/foreach}
			</dd>
			<dd>
				<input onclick="return updateNav()" class="submit" type="submit" value="修改导航" name="sub" >
			</dd>
		</dl>
	</form> 
</body>
</html>