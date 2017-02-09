<?php
	/**
	 * 商品模型类
	 */
	class GoodsModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象及本模型对象
			$this->_fields = array('id','nav','bread','sn','name','price_sale','price_market','price_cost','keyword','unit','weight','thumbnail','thumbnail2','content','is_up','recommend','is_freight','inventory','warn_inventory','sales','service','date','attr');
			$this->_tables = array(DB_FREFIX.'goods');
			$this->_checkObj = new GoodsCheck();
		}
		/**
		 * 添加商品方法
		 */
		public function addGoods(){
			list($_sn)= $this->getRequest()->getParam(array($_POST['sn']));
			$_where = array("sn='$_sn'");
			if(!$this->_checkObj->addCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_addData = $this->getRequest()->add($this->_fields);
			$attr ='';
			if(!empty($_addData['attr'])){
				foreach ($_addData['attr'] as $key => $value) {
					$attr.=$key.':'.implode('|',$value).';';
				}
				$attr = substr($attr,0,-1);
			}
			$_addData['attr'] = $attr;
			$_addData['date'] = time();
			$_star = '';
			$_end = '';
			$_thumbnailname= basename($_addData['thumbnail']);
			$_end = strstr(basename($_addData['thumbnail']),'.');
			$_star = substr($_addData['thumbnail'],0,-strlen(strstr($_thumbnailname,'.')));
			$thumbnail2 = $_star.'220X220'.$_end;
			$_addData['thumbnail2'] = $thumbnail2;
			return parent::add($_addData);
		}

		/**
		 * 验证商品名称是否重复
		 * @param [type:array] $_where [用户名]
		 */
		public function OneGoods(Array $_param){
			return parent::isOne($_param);
		}

		//获取条数
		public function totalGoods(){
			if(!empty($_GET['navid'])){
				$this->_tables = array(DB_FREFIX.'nav');
				list($_navid) = $this->getRequest()->getParam(array($_GET['navid']));
				$_idArr= parent::select(array('id'),array('where'=>array("sid='{$_navid}'")));
				$this->_tables = array(DB_FREFIX.'goods');
				if(!empty($_idArr)){
					$_navid = '';
					foreach ($_idArr as $key => $value) {
						$_navid .= $value['id'].',';
					}
					$_navid = substr($_navid, 0,-1);
				}
				$_price = '';
				$_bread = '';
				$_attr = '';
				if(isset($_GET['price'])){
					$_priceLeft = strstr($_GET['price'],',', true);
					$_priceright = strstr($_GET['price'],',');
					$_priceright = substr($_priceright,1);
					if(is_numeric($_priceLeft) && is_numeric($_priceright)){
						$_price = "AND price_sale BETWEEN ".$_priceLeft." AND ".$_priceright;
					}
				}
				if(isset($_GET['bread']) && intval($_GET['bread'])){
					$_bread = "AND bread =".$_GET['bread'];
				}
				if(isset($_GET['attr'])){
					$_attr = "AND attr LIKE  '%{$_GET['attr']}%'";
				}
				$_where = array('where'=>array("nav in ($_navid) and is_up=1 $_price $_bread $_attr"),'limit'=>$this->_limit);
				return parent::total($_where);
			}else{
				return parent::total();
			}
		}

		//获取推荐商品
		public function recommend(){
			return parent::select(array('thumbnail2','price_sale','name','id','nav','price_market'),array('limit'=>'0,5','where'=>array("recommend='1'")));
		}

		//获取当月热销
		public function hotProduct(){
			return parent::select(array('thumbnail2','price_sale','name','id','nav'),array('order'=>"sales desc",'limit'=>'0,5'));
		}

		//删除指定内容
		public function deleteGoods(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::delete($_where);
		}

		//提交订单后减库存加销售量
		public function reduceInventory($cartid){
			$this->_tables = array(DB_FREFIX.'cart');
			$cartid = substr($cartid,0,-1);
			$cart = parent::select(array('goods_id','nums'),array('where'=>array("id in ($cartid)")));
			$this->_tables = array(DB_FREFIX.'goods');
			foreach ($cart as $key => $value) {
				parent::update(array('inventory'=>array("inventory-{$value['nums']}")),array('where'=>array("id={$value['goods_id']}")));
				parent::update(array('sales'=>array("sales+{$value['nums']}")),array('where'=>array("id={$value['goods_id']}")));
			}
			
		}

		//获取指定的一条数据
		public function findOneGoods(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_goods = parent::select(array('*'),array('where'=>$_where,'limit' =>'1'));
			return $_goods;
		}

		//获取指定的一条详情数据
		public function findDetailGoods(){
			list($_goodsid) = $this->getRequest()->getParam(array($_GET['goodsid']));
			$_where = array("id='{$_goodsid}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error('./');
			}
			$_detailGoods = parent::select(array('*'),array('where'=>$_where,'limit' =>'1'));
			
			if($_detailGoods['0']['bread'] == 0){
				$_detailGoods['0']['bread'] = '其他品牌';
				return $_detailGoods;
			}
			$this->_tables = array(DB_FREFIX.'goods a',DB_FREFIX.'bread b');
			$_detailGoods = parent::select(array('a.id,a.recommend,a.sn,a.price_sale,a.price_market,a.keyword,a.unit,a.weight,a.thumbnail,a.thumbnail2,a.content,a.is_up,a.is_freight,a.inventory,a.warn_inventory,a.sales,a.service,a.name,a.attr,b.name bread'),array('where'=>array("a.id='{$_goodsid}' and b.id = '{$_detailGoods['0']['bread']}'"),'limit' =>'1'));
			$_detailGoods['0']['content'] = htmlspecialchars_decode($_detailGoods['0']['content']);
			$this->_tables = array(DB_FREFIX.'goods');
			return $_detailGoods;
		}


		//修改指定的一条数据
		public function updateGoods(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			list($_sn) = $this->getRequest()->getParam(array($_POST['sn']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			if(!$this->_checkObj->updateCheck($this,array("id<>$_id and sn='{$_sn}'"))){
				$this->_checkObj->error();
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			$_star = '';
			$_end = '';
			$attr = '';
			if(!empty($_updataData['attr']) && is_array($_updataData['attr'])){
				foreach ($_updataData['attr'] as $key => $value) {
					$attr.=$key.':'.implode('|',$value).';';
				}
				$attr = substr($attr,0,-1);
			}
			$_updataData['attr'] = $attr;
			$_thumbnailname= basename($_updataData['thumbnail']);
			$_end = strstr(basename($_updataData['thumbnail']),'.');
			$_star = substr($_updataData['thumbnail'],0,-strlen(strstr($_thumbnailname,'.')));
			$thumbnail2 = $_star.'220X220'.$_end;
			$_updataData['thumbnail2'] = $thumbnail2;
			$_updataData['date'] = time();
			return parent::update($_updataData,array('where'=>$_where));
		}


		//获取所有商品
		public  function  getAllGoods(){
			$this->_tables = array(DB_FREFIX.'goods a',DB_FREFIX.'nav b');
			$goods  = $this->select(array('a.name gname,a.id,a.sn,a.price_sale,a.nav,a.bread,a.is_up,a.inventory,b.name nname'),array('where'=>array("a.nav=b.id"),'limit' =>$this->_limit,'order'=>'a.date asc'));
			$this->_tables = array(DB_FREFIX.'bread');
			foreach ($goods as $key => $value) {
				if($value['bread'] != 0 ){
					$bread= $this->select(array('name'),array('where'=>array("id='{$value['bread']}'")));
					foreach ($bread as $key1 => $value1) {
						$goods[$key]['bread'] = $value1['name'];
					}
				}else{
					$goods[$key]['bread'] = '其他品牌';
				}
				
			}
			return $goods;
		}

		//获取指定商品
		public function findListGoods(){
			$this->_tables = array(DB_FREFIX.'nav');
			list($_navid) = $this->getRequest()->getParam(array($_GET['navid']));
			$_idArr= parent::select(array('id'),array('where'=>array("sid='{$_navid}'")));
			$this->_tables = array(DB_FREFIX.'goods');
			if(!empty($_idArr)){
				$_navid = '';
				foreach ($_idArr as $key => $value) {
					$_navid .= $value['id'].',';
				}
				$_navid = substr($_navid, 0,-1);
			}
			$_price = '';
			$_bread = '';
			$_attr = '';
			if(isset($_GET['price'])){
				$_priceLeft = strstr($_GET['price'],',', true);
				$_priceright = strstr($_GET['price'],',');
				$_priceright = substr($_priceright,1);
				if(is_numeric($_priceLeft) && is_numeric($_priceright)){
					$_price = "AND price_sale BETWEEN ".$_priceLeft." AND ".$_priceright;
				}
			}
			if(isset($_GET['bread']) && intval($_GET['bread'])){
				$_bread = "AND bread =".$_GET['bread'];
			}
			if(isset($_GET['attr'])){
				$_attr = "AND attr LIKE  '%{$_GET['attr']}%'";
			}
			

			$findGood = parent::select(array('*'),array('where'=>array("nav in ($_navid) and is_up=1 $_price $_bread $_attr"),'limit'=>$this->_limit));
			return $findGood;
		}

		//检查编号是否正确
		public function ajaxSn(){
			if(!empty($_POST['id'])){
				list($_id) = $this->getRequest()->getParam(array($_POST['id']));
				list($_sn) = $this->getRequest()->getParam(array($_POST['sn']));
				$_where = array("id<>$_id and sn='{$_sn}'");
			}else{
				list($_sn) = $this->getRequest()->getParam(array($_POST['sn']));
				$_where = array("sn='{$_sn}'");
			}
			$this->_checkObj->ajaxSnCheck($this,$_where);
		}


		//修改上下架状态
		public  function is_up_down(){
			list($_id) = $this->getRequest()->getParam(array($_POST['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				echo -1;
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			return parent::update($_updataData,array('where'=>$_where));
		}
	}
?>