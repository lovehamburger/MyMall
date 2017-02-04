<?php
/**
 * 购物车控制器
 */
	class CartAction extends Action
	{
		private $_nav = null;
		private $_order = null;
		private $_ress = null;
		public function __construct() {
			parent::__construct();
			$this->_nav = new NavModel();
			$this->_order = new OrderModel();
			$this->_ress = new MemberressModel();
			if(!isset($_SESSION['member'])){
				 $this->_redirectObj->succ('?a=member&m=login','请先登录哦亲!');
			}
		}

		//购物车
		public function index(){
			parent::page($this->_modelObj->totalCart(),PAGE_SIZE);
			$this->_tpl->assign('topNav',$this->_nav->getTopNav());
			$this->_tpl->assign('FrontCart',$this->_modelObj->getAllCart());
			$this->_tpl->display(SMARTY_FRONT.'public/cart.tpl');
		}

		//添加购物车
		public function addProduct(){
			if(!empty($_POST)){
				if($this->_modelObj->addCart()){
					$this->_redirectObj->succ('?a=cart','购物车添加成功!');
				}else{
					$this->_redirectObj->error('购物车添加失败!');
				}
			}
		}

		//修改购物车商品数量
		public function update(){
			if(!empty($_POST)){
				$this->_modelObj->updateCart();
			}else{
				$this->_tpl->assign('addNav',$this->_nav->getAddCartNav());
				$this->_tpl->assign('oneCart',$this->_modelObj->findOneCart());
				$this->_tpl->display(SMARTY_ADMIN.'cart/update.tpl');
			}
			
		}

		//删除购物车
		public function delete(){
			if(!empty($_GET)){
				$this->_modelObj->delProduct() ?$this->_redirectObj->succ('?a=cart','购物车删除成功!') : $this->_redirectObj->error('购物车删除失败!');
			}
			
		}
		//结算
		public function flow(){
			if(!empty($_POST['cartid'])){
				$this->_tpl->assign('FrontCart',$this->_modelObj->getFlowCart($_POST['cartid']));
				$this->_tpl->assign('topNav',$this->_nav->getTopNav());
				$this->_tpl->assign('selectedRess',$this->_ress->getAllMemberress());
				$this->_tpl->display(SMARTY_FRONT.'public/flow.tpl');
			}else{
				$this->_redirectObj->error('必须选择一个购物车商品!');
			}
			
		}
		//提交订单
		public function order(){
			if(!empty($_POST)){
				$_info = $this->_order->addOrder();
				if($_info > 0){
					echo "$_info";
				}
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}
	}
?>