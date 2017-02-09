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
	{include file='default/public/kf.tpl'}
	{include file='default/public/member_sidebar.tpl'}
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
			{foreach from=$allMemberress key=key item=value}
			<tr>
				<td>{$value.name}</td>
				<td>{$value.address}</td>
				<td>{$value.code}</td>
				<td>{$value.tel}</td>
				<td>{$value.email}</td>
				<td>{$value.buildings}</td>
				<td>
					{if $value.selected == 1}
					<span class="selected" style="color:green;" val="{$value.id}">是</span>
					{else}
					<span class="select" onclick="selected({$value.id},this)">首选</span>
					{/if}	
		 | 修改 | 删除
				</td>
			</tr>
			{foreachelse}
			<td colspan="7">暂无数据╥﹏╥...</td>
			{/foreach}
		</table>
		<p style="text-align:center;margin:5px 0;">
			<a href="?a=cart&m=flow">[去结算中心]</a>
		</p>
	</div>
{include file='default/public/footer.tpl'}
</body>
</html>