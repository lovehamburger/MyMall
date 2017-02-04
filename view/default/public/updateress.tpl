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
	{include file='default/public/header.tpl'}
	{include file='default/public/member_sidebar.tpl'}
	<div id="main">
		<h2>收货地址</h2>
		<form action="?a=member&m=updateress&id={$oneRess.id}" method="post">
			<dl>
				<dd>
					收 货 人：
					<input type="text" name="name" class="text" value='{$oneRess.name}' placeholder="长度不超过25个字符" />
				</dd>
				<dd>
					<span style="float: left; width: 65px;">收货地址：</span>
					<textarea name="address" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息" class="text" style="width:250px;height: 62px">{$oneRess.address}</textarea>
				</dd>
				<dd>
					电子邮件：
					<input type="text" value='{$oneRess.email}'  name="email" class="text" placeholder="请输入正确的电子邮件"/>
				</dd>
				<dd>
					邮政编码：
					<input type="text" name="code" value='{$oneRess.code}'  class="text" placeholder="如您不清楚邮递区号，请填写000000"/>
				</dd>
				<dd>
					手机号码：
					<input type="text" value='{$oneRess.tel}'  name="tel" class="text" placeholder="请输入正确的手机号码"/>
				</dd>
				<dd>
					标志建筑：
					<input type="text" value='{$oneRess.buildings}'  name="buildings" class="text" placeholder="非必填"/>
				</dd>
				<dd>
					<input type="checkbox" {if $oneRess.selected==1}checked="checked"{/if} name="selected"/>设置为默认收货地址
				</dd>
				<dd>
					<input type="submit" name="send" value="修改收货地址" class="submit" />
				</dd>
			</dl>
		</form>
	</div>
	{include file='default/public/footer.tpl'}
</body>
</html>