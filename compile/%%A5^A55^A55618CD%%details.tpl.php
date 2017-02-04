<?php /* Smarty version 2.6.26, created on 2017-02-01 22:21:22
         compiled from default/public/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/details.css" />
	<script type="text/javascript" src="view/default/js/channel.js"></script>
	<script type="text/javascript" src="view/default/js/jquery.js"></script>
	<script type="text/javascript" src="view/default/js/attr.js"></script>
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="sidebar">
		<h2><?php echo $this->_tpl_vars['mainNav']['name']; ?>
</h2>
		<ul>
			<?php $_from = $this->_tpl_vars['mainNav']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
			<li>
				<a href="?a=list&m=index&navid=<?php echo $this->_tpl_vars['val']['id']; ?>
">
					<?php echo $this->_tpl_vars['val']['name']; ?>

					<span class="gray">(1000)</span>
				</a>
			</li>
			<?php endforeach; else: ?>
			<span>暂无数据╥﹏╥...</span>
			<?php endif; unset($_from); ?>
		</ul>
		<h2>当月热销</h2>
		<div style="margin:0 0 10px 0">
			<dl style="border:none;">
				<dt>
					<a href="###">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="###">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="###">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<p>
				<a href="###">查看更多</a>
			</p>
		</div>
		<h2>浏览记录</h2>
		<div style="margin:0 0 10px 0">
			<dl style="border:none;">
				<dt>
					<a href="###">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="###">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="###">
						<img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" />
					</a>
				</dt>
				<dd class="price">￥158.00</dd>
				<dd class="title">
					<a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a>
				</dd>
			</dl>
			<p>
				<a href="###">查看更多</a>
				<a href="###">清空</a>
			</p>
		</div>
	</div>
	<form action="?a=cart&m=addProduct" method="post">
	<div id="main">
		<h2><?php echo $this->_tpl_vars['detailGoods']['name']; ?>
</h2>
		<dl class="pic">
			<dt>
				<a href="###">
					<img src="<?php echo $this->_tpl_vars['detailGoods']['thumbnail']; ?>
" alt="<?php echo $this->_tpl_vars['detailGoods']['name']; ?>
" title="<?php echo $this->_tpl_vars['detailGoods']['name']; ?>
" />
				</a>
			</dt>
			<dd><!-- 分享至：新浪微博 | 腾讯微博 | 人人网 | 开心网 -->
			<!-- <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1466694877752">
			        		<a href="#" class="bds_more" data-cmd="more"></a>
			        		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
			        		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
			        		<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
			       		 <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
			       		 <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
			      	</div> -->
			      	<div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1485958672179"><a class="bds_more" href="#" data-cmd="more"></a><a class="bds_tsina" title="分享到新浪微博" href="#" data-cmd="tsina"></a><a class="bds_tieba" title="分享到百度贴吧" href="#" data-cmd="tieba"></a><a class="bds_qzone" title="分享到QQ空间" href="#" data-cmd="qzone"></a><a class="bds_sqq" title="分享到QQ好友" href="#" data-cmd="sqq"></a><a class="bds_tqq" title="分享到腾讯微博" href="#" data-cmd="tqq"></a><a class="bds_renren" title="分享到人人网" href="#" data-cmd="renren"></a><a class="bds_douban" title="分享到豆瓣网" href="#" data-cmd="douban"></a><a class="bds_mshare" title="分享到一键分享" href="#" data-cmd="mshare"></a></div>
      	</dd>
		</dl>
		<dl class="text">
			<dd>
				售　　价：
				<span class="sale">￥<?php echo $this->_tpl_vars['detailGoods']['price_sale']; ?>
</span>
				<span class="market">￥<?php echo $this->_tpl_vars['detailGoods']['price_market']; ?>
</span>
			</dd>
			<dd>商品编号：<?php echo $this->_tpl_vars['detailGoods']['sn']; ?>
</dd>
			<dd>所属品牌：<?php echo $this->_tpl_vars['detailGoods']['bread']; ?>
</dd>
			<dd>
				销 售 量：
				<span class="sale_num">136</span>
				<?php echo $this->_tpl_vars['detailGoods']['unit']; ?>

			</dd>
			<dd>
				重　　量：<?php echo $this->_tpl_vars['detailGoods']['weight']; ?>
 kg <?php if ($this->_tpl_vars['detailGoods']['is_freight'] == 1): ?>
				<span class="gray">(免运费)</span>
				<?php endif; ?>
			</dd>
			<dd >
				数　　量：
				<input type="text" value="1" class="num" name="nums" />
				<?php echo $this->_tpl_vars['detailGoods']['unit']; ?>

				<span class="gray">(目前库存：<?php echo $this->_tpl_vars['detailGoods']['inventory']; ?>
<?php echo $this->_tpl_vars['detailGoods']['unit']; ?>
)</span>
			</dd>

			<dd class="attr" style="display: none">
				
			</dd>
			<input type="hidden" name="goods_id" value="<?php echo $this->_tpl_vars['detailGoods']['id']; ?>
">

			<dd class="buy_button">
				<input type="submit" class="send" onclick="return attrCheck()" alt="购买" title="购买" value="加入购物车"/>
				<img src="view/default/images/collect.gif" alt="收藏" title="收藏" />
			</dd>
		</dl>
		<div class="content">
			<ul>
				<li id="button1" onclick="channel(1)" class="first">商品详情</li>
				<li id="button2" onclick="channel(2)">评价列表</li>
				<li id="button3" onclick="channel(3)">成交记录</li>
				<li id="button4" onclick="channel(4)">售后服务</li>
			</ul>
			<div class="c1" id="c1" style="display:block;"><?php echo $this->_tpl_vars['detailGoods']['content']; ?>
</div>
			<div class="c2" id="c2" style="display:none;">评价列表</div>
			<div class="c3" id="c3" style="display:none;">成交记录</div>
			<div class="c4" id="c4" style="display:none;">售后服务</div>
		</div>
	</div>
	</form>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<input type="hidden" name="attr" class="text" value='<?php echo $this->_tpl_vars['detailGoods']['attr']; ?>
'/>
	<input type="hidden" name="navid" class="text" value='<?php echo $_GET['navid']; ?>
'/>
</body>
</html>