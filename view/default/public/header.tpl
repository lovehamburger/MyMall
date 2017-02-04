<div id="header">
	<h1>
		<a href="./">陈龙辉网站商城</a>
	</h1>
	<div class="top">
		{if $smarty.session.member}
		您好，{$smarty.session.member}，欢迎再次光临，<a href="?a=member">个人中心</a> | <a href="?a=cart">购物车</a> | <a href="?a=member&m=logout">退出</a>
		{else}
		<a href="?a=member&m=login"><img src="view/default/images/bnt_log.gif" alt="登录" /></a>
		<a href="?a=member&m=reg"><img src="view/default/images/bnt_reg.gif" alt="注册" /></a>
		{/if}
	</div>
</div>

<div id="nav">
	<ul>
		<li>
			<a href="./" {if !$smarty.get.navid}class='strong'{/if}>首页</a>
		</li>
		{foreach from=$topNav key=key item=value}
		<li>
			<a href="?a=list&navid={$value.id}" {if $mainNav.id == $value.id}class='strong'{/if}>{$value.name}</a>
		</li>
		{/foreach}
	</ul>
</div>

<div id="search"></div>
<div id="sait">
	当前位置：<a href="./">首页</a> {foreach from=$BreadNav key=key item=val} &gt; <a href="?a=list&m=index&navid={$val.0.id}">{$val.0.name}</a>{/foreach} {if $smarty.get.goodsid}&gt; {$detailGoods.name} {/if} {if $smarty.get.m == reg}&gt; 注册会员 {/if} {if $smarty.get.m == login}&gt; 会员登录 {/if} {if $smarty.get.a == cart}&gt; 购物车 {/if} {if $smarty.get.a == member}&gt; 个人中心 {/if}
	{if $smarty.get.m == flow}&gt; 结算 {/if}
</div>