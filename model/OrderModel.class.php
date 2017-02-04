<?php
	/**
	 * 购物车模型类
	 */
	class OrderModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象及本模型对象
			$this->_fields = array('id','user','name','email','address','code','tel','buildings','delivery','pay','price','delivery_price','pay_price','text','ps','ordernum','goods','order_state','order_pay','order_delivery','delivery_name','delivery_url','delivery_number','refund','date');
			$this->_tables = array(DB_FREFIX.'order');
			$this->_checkObj = new OrderCheck();
		}
		/**
		 * 添加订单方法
		 */
		public function addOrder(){
			$_addData = $this->getRequest()->add($this->_fields);
			$_addData['date'] = time();
			$_addData['ordernum'] = date('Ymdhis').rand(0,9999999);
			$_addData['goods'] = base64_encode(serialize($_addData['goods']));
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			$_addData['user'] = $_memberId['0']['id'];
			if(parent::add($_addData)){
				$_memberObj = new MemberModel();
				$_memberId = $_memberObj->findOneMember($_SESSION['member']);
				$id = parent::select(array('id'),array('where'=>array("date={$_addData['date']}","user={$_memberId['0']['id']}")));//获取添加的订单id
				return  $id['0']['id'];
			}
		}

		/**
		 * 验证是否存在购物车中
		 * @param [type:array] $_where [用户名]
		 */
		public function OneOrder(Array $_param){
			return parent::isOne($_param);
		}

		//获取订单条数
		public function totalOrder(){
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

		//获取指定的一条数据
		public function findOneOrder(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_oneOrder = parent::select(array('*'),array('where'=>$_where,'limit' =>'1'));
			if(!empty($_oneOrder['0']['nav'])){
				$_oneOrder['0']['nav'] = explode(',',$_oneOrder['0']['nav']);
			}else{
				$_oneOrder['0']['nav'] = array();
			}
			return $_oneOrder;
		}


		//修改指定的一条订单数据根据id
		public function updateOrder(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			return parent::update($_updataData,array('where'=>$_where));
		}

		//修改指定的一条订单数据根据订单号
		public function updateOrderNum() {
			list($_ordernum) = $this->getRequest()->getParam(array($_REQUEST['r6_Order']));
			$_where = array("ordernum='$_ordernum'");
			$_updateData['order_pay'] = '1';
			return parent::update($_updateData,array('where'=>$_where));
		}


		//获取所有相关会员订单
		public function findUserAll(){
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			$_allOrder = parent::select(array('*'),array('where'=>array("user='{$_memberId['0']['id']}'"),'limit'=>$this->_limit,'order'=>'date desc'));
			if(!empty($_allOrder)){
				$_allOrder = $this->states($_allOrder);
			}
			return $_allOrder;
		}

		//获取所有会员订单
		public function getAllOrder(){
			$_allOrder = parent::select(array('ordernum,id,price,order_state,order_pay,order_delivery,date'),array('limit'=>$this->_limit,'order'=>'date desc'));
			$_allOrder = $this->states($_allOrder);
			return $_allOrder;
		}

		//获取订单详情
		public function orderDetais(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			$orderDetais = parent::select(array('*'),array('where'=>array("user='{$_memberId['0']['id']}'","id=$_id"),'limit'=>1));
			$orderDetais = $this->states($orderDetais);
			if(!empty($orderDetais)){
				foreach ($orderDetais as $key => $value) {
					$orderDetais[$key]['goods'] = unserialize(base64_decode($value['goods']));
				}
			}else{
				$this->_checkObj->error();
			}
			
			/*echo "<pre>";
			print_r($orderDetais);*/
			return $orderDetais;
		}

		//重新写入状态
		public function states($arrData){
			foreach ($arrData as $key => $value) {
				switch ($value['order_state']) {
					case '0':
						$arrData[$key]['order_state'] = '未确认';
						break;
					case '1':
						$arrData[$key]['order_state'] = '已确认';
						break;
					case '2':
					$arrData[$key]['order_state'] = '已取消';
					break;
				}
				switch ($value['order_pay']) {
					case '0':
						$arrData[$key]['order_pay'] = '未支付';
						break;
					case '1':
						$arrData[$key]['order_pay'] = '已支付';
						break;
				}
				switch ($value['order_delivery']) {
					case '0':
						$arrData[$key]['order_delivery'] = '未发货';
						break;
					case '1':
						$arrData[$key]['order_delivery'] = '已配货';
						break;
					case '2':
						$arrData[$key]['order_delivery'] = '已发货';
					break;
					case '3':
						$arrData[$key]['order_delivery'] = '已完成';
						break;
				}
			}
			return $arrData;
		}
	}
?>