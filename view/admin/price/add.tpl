<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>陈龙辉后台商城管理系统</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css"/>
	<link rel="stylesheet" type="text/css" href="view/admin/style/price.css"/>
	<script type="text/javascript" src="view/admin/js/jquery.js"></script>
	<script type="text/javascript" src="view/admin/js/price.js"></script>
</head>
<body>
	<h2>
		商品————新增价格区间
		<a href="?a=price">返回价格区间列表</a>
	</h2>
	 <form method="post" action="?a=price&m=add">
	 <input type="hidden" name="ajaxName" val="">
		<dl class="form">
			<dd>
				价格区间：
				<input type="text" name="price_left" placeholder="左价格" /> —
				<input type="text" name="price_right" placeholder="右价格" />
				<span class="red">[必填]</span>(必须要是数字，左边的数字必须大于右边，最大5个字符)
			</dd>
			<dd>
				<button onclick="return addPrice()" class="submit" type="submit"  name="sub" >新增价格区间</button>
			</dd>
		</dl>
	</form> 
</body>
</html>