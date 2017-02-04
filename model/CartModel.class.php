<?php
	/**
	 * 购物车模型类
	 */
	class CartModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象及本模型对象
			$this->_fields = array('id','goods_id','user_id','attr','time','nums');
			$this->_tables = array(DB_FREFIX.'cart');
			$this->_checkObj = new CartCheck();
		}
		/**
		 * 添加购物车方法
		 */
		public function addCart(){
			if(isset($_SESSION['member'])){
				$_addData = $this->getRequest()->add($this->_fields);
				$_addData['time'] = time();
				if(!empty($_addData['attr'])){
					$_addData['attr'] = base64_encode(serialize($_addData['attr']));
				}//序列化会出现部分符号出错，使用本方法防止错误
 				$_memberObj = new MemberModel();
				$_memberId = $_memberObj->findOneMember($_SESSION['member']);
				$_addData['user_id'] = $_memberId['0']['id'];			
			}
				return parent::add($_addData);
		}

		/**
		 * 验证是否存在购物车中
		 * @param [type:array] $_where [用户名]
		 */
		public function OneCart(Array $_param){
			return parent::isOne($_param);
		}

		//获取条数
		public function totalCart(){
			return parent::total();
		}

		//删除指定内容
		public function delProduct(){
			$_where = array();
			if(isset($_GET['id'])){
				list($_id) = $this->getRequest()->getParam(array($_GET['id']));
				$_where = array("id='{$_id}'");
				if(!$this->_checkObj->findOneCheck($this,$_where)){
					$this->_checkObj->error();
				}
			}
			return parent::delete($_where);
		}

		//修改购物车中的商品数量
		public function updateCart(){
			if(intval($_POST['id'])){
				list($_id) = $this->getRequest()->getParam(array($_POST['id']));
				echo $_id;
				$_where = array("id='{$_id}'");
				if(!$this->_checkObj->findOneCheck($this,$_where)){
					$this->_checkObj->error();
				}
				$updateData =  $this->getRequest()->update($this->_fields);
				parent::update($updateData,array('where'=>$_where));
			}
		}

		//获取指定的购物车结算数据
		public function getFlowCart($cartid){
			if(is_array($cartid)){
				$cartidStr = implode(',', $cartid);
				$this->_tables = array(DB_FREFIX.'cart a',DB_FREFIX.'goods b');
				$cartRes = parent::select(array('a.id,a.attr,a.nums,b.name,b.price_sale'),array('where'=>array("a.id in ($cartidStr)","a.goods_id=b.id")));
				foreach ($cartRes as $key => $value) {
					if(!empty($value['attr'])){
						$cartRes[$key]['attr'] = unserialize(base64_decode($value['attr']));
						foreach ($cartRes[$key]['attr'] as $key1 => $value1) {
							$attr = '';
							foreach ($value1 as $key2 => $value2) {
								$attr.= $value2.',';
							}
							$attr = substr($attr,0,-1);
							$cartRes[$key]['attr'][$key1] = $attr.' | ';
						}
					}else{
						$cartRes[$key]['attr']['提示'] = '无属性';
					}
				}
				return $cartRes;
			}
		}

		//获取指定购物车
		public function getAllCart(){
			$_allCart = parent::select(array('*'),array('limit'=>$this->_limit));
			if(!empty($_allCart)){
				$this->_tables = array(DB_FREFIX.'cart a',DB_FREFIX.'goods b');
				foreach ($_allCart as $key => $value) {
						$_allCart[$key] = parent::select(array('a.id,a.attr,a.nums,a.goods_id,b.name,b.price_sale,b.thumbnail2,b.inventory'),array('where'=>array("b.id={$value['goods_id']} and a.goods_id={$value['goods_id']} and a.id={$value['id']}"),'limit'=>$this->_limit,'order'=>"a.time desc"));
				}
				foreach ($_allCart as $key=> $value) {
					foreach ($value as $key1 => $value1) {
						if(!empty($value1['attr'])){
							$_allCart[$key][$key1]['attr'] = unserialize(base64_decode($value1['attr']));
							foreach ($_allCart[$key][$key1]['attr'] as $key2 => $value2) {
								$attr = '';
								foreach ($value2 as $key3 => $value3) {
									$attr.= $value3.',';
								}
								$attr = substr($attr,0,-1);
								$_allCart[$key][$key1]['attr'][$key2] = $attr.' | ';
							}
						}else{
							$_allCart[$key][$key1]['attr']['提示'] = '无属性';
						}
					}
				}
			}
			return $_allCart;
		}
	}
?>