<?php
/**
 * 会员控制器
 */
class MemberAction extends Action
{
	private $_nav = null;
	private $_ress = null;
	private $_order = null;
	public function __construct() {
		parent::__construct();
		$this->_nav = new NavModel();
		$this->_ress = new MemberressModel();
		$this->_order = new OrderModel();
	}

	//会员个人中心
	public function index(){
		if(isset($_SESSION['member'])){
			$this->_tpl->assign('topNav',$this->_nav->getTopNav());
			$this->_tpl->display(SMARTY_FRONT.'public/member.tpl');
		}else{
			$this->_redirectObj->succ('?a=member&m=login','请先登录哦!');
		}
	}

	//会员个人中心收货地址
	public function address(){
		if(isset($_SESSION['member'])){
			if(!empty($_POST)){
				if($this->_ress->addMemberress()){
					$this->_redirectObj->succ('?a=member&m=address','地址添加成功!');
				}else{
					$this->_redirectObj->error('地址添加失败!');
				}
			}else{
				$this->_tpl->assign('allMemberress',$this->_ress->getAllMemberress());
				$this->_tpl->assign('topNav',$this->_nav->getTopNav());
				$this->_tpl->display(SMARTY_FRONT.'public/member_address.tpl');
			}
		}else{
			$this->_redirectObj->succ('?a=member&m=login','请先登录哦!');
		}
	}

	//会员个人中心收货地址
	public function updateress(){
		if(!empty($_POST)){
			$this->_ress->updateMemberress() == 1 ? $this->_redirectObj->close('修改地址成功!') : $this->_redirectObj->error('修改地址失败!');
		}else{
			$this->_tpl->assign('topNav',$this->_nav->getTopNav());
			$this->_tpl->assign('oneRess',$this->_ress->findOneMemberress()['0']);
			$this->_tpl->display(SMARTY_FRONT.'public/updateress.tpl');
		}
		
	}

	//会员个人中心收货地址设置首选
	public function selected(){
		if(!empty($_POST['id'])){
			echo $this->_ress->ajaxSelected()==1 ? 1 : -2;
		}else{
			$this->_redirectObj->error('非法访问!');
		}
	}

	//会员个人中心订单列表
	public function order(){
		/*$this->page($this->_order->totalOrder(),1);*/
		if(isset($_REQUEST['r6_Order'])){
			$this->_order->updateOrderNum();
		}
		$this->_tpl->assign('allOrder',$this->_order->findUserAll());
		$this->_tpl->assign('topNav',$this->_nav->getTopNav());
		$this->_tpl->display(SMARTY_FRONT.'public/member_order.tpl');
	}

	//会员个人中心订单详情
	public function order_details(){
		if(isset($_SESSION['member'])){
			if(!empty($_GET['id'])){
				$this->_tpl->assign('orderDetais',$this->_order->orderDetais()['0']);
				$this->_tpl->assign('topNav',$this->_nav->getTopNav());
				$this->_tpl->assign('prev', Tool::getPrevPage());
				$this->_tpl->display(SMARTY_FRONT.'public/member_order_details.tpl');
			}
		}else{
			$this->_redirectObj->succ('?a=member&m=login','请先登录哦!');
		}
	}

	//订单支付
	public function yeepay(){
		if(!empty($_GET['id']) && !empty($_SESSION['member'])){
			$this->_tpl->assign('orderDetais',$this->_order->orderDetais()['0']);
			$this->_tpl->display(SMARTY_FRONT.'public/payord.tpl');
		}else{
			$this->_redirectObj->error('非法访问!');
		}
	}

	//订单确认收货
	public function harvest(){
		if(!empty($_GET['id']) && !empty($_SESSION['member'])){
			if($this->_order->updateState('order_delivery',3)){
				$this->_redirectObj->succ('?a=member&m=order','确认收获成功!');
			}else{
				$this->_redirectObj->error('确认收获失败!');
			}
		}else{
			$this->_redirectObj->error('非法访问!');
		}
	}

	//前台取消订单
	public function remove(){
		if(!empty($_GET['id']) && !empty($_SESSION['member'])){
			if($this->_order->updateState('order_state',2)){
				$this->_redirectObj->succ('?a=member&m=order','取消订单成功!');
			}else{
				$this->_redirectObj->error('取消订单失败!');
			}
		}else{
			$this->_redirectObj->error('非法访问!');
		}
	}


/*********************************个人中心end****************************************/

	//会员登录
	public function login(){
		if(!empty($_POST)){
			if($this->_modelObj->checkLogin()){
				$this->_modelObj->countLogin();
				$this->_redirectObj->succ('./');
			}
		}
		$this->_tpl->assign('topNav',$this->_nav->getTopNav());
		$this->_tpl->display(SMARTY_FRONT.'public/login.tpl');
	}

	//添加会员
	public function reg(){
		if(!empty($_POST)){
			if($this->_modelObj->addMember()){
					$this->_redirectObj->succ('?a=member&m=login','用户注册成功!');
			}
		}
		$this->_tpl->assign('topNav',$this->_nav->getTopNav());
		$this->_tpl->display(SMARTY_FRONT.'public/reg.tpl');
	}

	//会员退出
	public function logout(){
		session_unset();
		setcookie('auto','');
		$this->_redirectObj->succ('?a=member&m=login');
	}

	public function ajaxCheckFrontLogin(){
		if(!empty($_POST)){
			$this->_modelObj->ajaxCheckLogin($_POST['user'],$_POST['pass']);
		}
	}

	public function ajaxCheckFrontCode(){
		if(!empty($_POST)){
			$this->_modelObj->ajaxCheckCode($_POST['code']);
		}
	}
}
?>