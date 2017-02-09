<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/list.css" />
</head>
<body>
	{include file='default/public/header.tpl'}
	{include file='default/public/kf.tpl'}
	<div id="sidebar">
		<h2>{$mainNav.name}</h2>
		<ul>
			{foreach from=$mainNav.sub key=key item=val}
			<li>
				<a href="?a=list&m=index&navid={$val.id}">
					{$val.name}
					<span class="gray">(1000)</span>
				</a>
			</li>
			{foreachelse}
			<span>暂无数据╥﹏╥...</span>
			{/foreach}
		</ul>
		<h2>当月热销</h2>
		<div style="margin:0 0 10px 0">
		{foreach from=$hotProduct key=key item=value}
			<dl>
				<dt>
					<a href="?a=details&id=11">
						<img style="width: 102px;height: 102px" src="{$value.thumbnail2}" alt="{$value.name}" title="{$value.name}" />
					</a>
				</dt>
				<dd class="price">￥{$value.price_sale}</dd>
				<dd class="title">
					<a href="?a=details&id=11">{$value.name}</a>
				</dd>
			</dl>
		{/foreach}
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
			{if $navBread}
				<p>
					品牌：
					{if $smarty.get.bread}
					<a href="?a=list&navid={$smarty.get.navid}&attr={$smarty.get.attr}&price={$smarty.get.price}">全部</a>
					{else}
					<span><a href="?a=list&navid={$smarty.get.navid}&attr={$smarty.get.attr}&price={$smarty.get.price}">全部</a></span>
					{/if}
					{foreach from=$navBread key=key item=value}
						{if $smarty.get.bread == $key}
						<span><a href="{$url}&bread={$key}">{$value}</a></span>
						{else}
						<a href="{$url}&bread={$key}">{$value}</a>
						{/if}
					{/foreach}
				</p>
			{/if}
			{foreach from=$navAttr key=key item=value}
			<p>
				{$key}：
				{if $smarty.get.attr}
					<a href="?a=list&navid={$smarty.get.navid}&bread={$smarty.get.bread}&price={$smarty.get.price}">全部</a>
					{else}
					<span><a href="?a=list&navid={$smarty.get.navid}&bread={$smarty.get.bread}&price={$smarty.get.price}">全部</a></span>
				{/if}
				{foreach from=$value key=key1 item=value1}
					{if $smarty.get.attr == $value1}
						<span><a href="{$url}&attr={$value1}">{$value1}</a></span>
					{else}
						<a href="{$url}&attr={$value1}">{$value1}</a>
					{/if}
				{/foreach}
			</p>
			{/foreach}
			{if $navPrice}
				<p>
					价格：
					{if $smarty.get.price}
					<a href="?a=list&navid={$smarty.get.navid}&bread={$smarty.get.bread}">全部</a>
					{else}
					<span><a href="?a=list&navid={$smarty.get.navid}&bread={$smarty.get.bread}">全部</a></span>
					{/if}
					{foreach from=$navPrice key=key item=value}
						{if $smarty.get.price == $key}
						<span><a href="{$url}&price={$key}">{$value}</a></span>
						{else}
						<a href="{$url}&price={$key}">{$value}</a>
						{/if}
					{/foreach}
				</p>
			{/if}
		</div>
		<h2>商品列表</h2>
		<div class="pro">
		{foreach from=$allGoods key=key item=value}
			<dl>
				<dt>
					<a href="?a=details&navid={$value.nav}&goodsid={$value.id}">
						<img src="{$value.thumbnail2}" alt="{$value.name}" title="{$value.name}" />
					</a>
				</dt>
				<dd class="price"> <strong>￥{$value.price_sale}</strong> <del>￥{$value.price_market}</del>
				</dd>
				<dd class="title">
					<a href="?a=details&id=11">{$value.name}</a>
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
			{foreachelse}
			没有数据
			{/foreach}
			<div id="page">{$page}</div>
		</div>
	</div>
{include file='default/public/footer.tpl'}
</body>
</html>